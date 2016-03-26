<?php
namespace Magebay\Marketplace\Controller\Seller;
class Account extends \Magento\Framework\App\Action\Action{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */	
	protected $resultPageFactory;
	
	protected $_customerSession;
	
    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
		//\Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
		//$this->_customerSession = $customerSession;
        parent::__construct($context);
    }	
	
    /**
     * Default customer account page
     *
     * @return void
     */
    public function execute()
    {
		if($this->_getSession()->authenticate()){					
			$resultPageFactory = $this->resultPageFactory->create();
			$resultPageFactory->getConfig()->getTitle()->set(__('Profile Seller'));
			return $resultPageFactory;
		}
	}
	
    protected function _getSession()
    {
		$this->_customerSession=$this->_objectManager->get('Magento\Customer\Model\Session');
        return $this->_customerSession;
    }	
}