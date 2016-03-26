<?php

namespace Magebay\Marketplace\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\ObjectManagerInterface;
use \Magento\Framework\App\RequestInterface;


class CustomerRegisterSuccess implements ObserverInterface
{    
    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;  

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;
	protected $_objectManager;
	protected $_request;
	protected $_messageManager;
	protected $_customerCollectionFactory;
    /**
     * @var \Magento\Framework\Translate\Inline\StateInterface
     */
    protected $inlineTranslation;
    

    /**
     * OrderPlaceAfter constructor.
     *     
     * @param \Magento\Framework\Mail\Template\TransportBuilder   $transportBuilder
     * @param \Magento\Framework\App\Config\ScopeConfigInterface  $scopeConfig
     * @param \Magento\Framework\Translate\Inline\StateInterface  $inlineTranslation          
     * @param array                                               $data
     */
    public function __construct(        
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,        
		\Magento\Framework\Message\ManagerInterface $messageManager,
		\Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory,
		RequestInterface $request,
		ObjectManagerInterface $objectManager,        
        array $data = []
    )
    {        
        $this->_transportBuilder = $transportBuilder;        
        $this->_scopeConfig = $scopeConfig;
        $this->inlineTranslation = $inlineTranslation;        
        $this->_request = $request;        
        $this->_customerCollectionFactory = $customerCollectionFactory;        
		$this->_objectManager = $objectManager;        
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     *
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {		
		try{					
			$_data=$this->_request->getParams();
			$_customerconllection=self::getCustomerByEmail($_data['email']);
			$_customer=$_customerconllection->getData();
			$_newdata['email']=$_data['email'];
			$_newdata['name']=$_data['firstname'].$_data['lastname'];
			$_newdata['is_vendor']=$_data['is_seller'];
			if($_data['is_seller'])
				$_newdata['storeurl']=$_data['profileurl'];
			$_newdata['user_id']=$_customer[0]['entity_id'];
			$_newdata['stores_id']=$_customer[0]['store_id'];
			$_newdata['created_at']=$_customer[0]['created_at'];
			$_model=$this->_objectManager->create('Magebay\Marketplace\Model\Sellers');
			$_model->addData($_newdata);
			$_model->save();
		}catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->_messageManager->addError(nl2br($e->getMessage()));            
        } catch (\Exception $e) {
            $this->_messageManager->addException($e, __('Something went wrong while saving this .').' '.$e->getMessage());            
        }		
    }
	
	public function getCustomerByEmail($email){
		$customerCollection=$this->_customerCollectionFactory->create()->addFieldToFilter('email',$email);		
		return $customerCollection;
	}
}
