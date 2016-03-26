<?php
namespace Magebay\Marketplace\Controller\Product\Attribute;
use Magento\Framework\App\Action\Context;

class News extends \Magento\Framework\App\Action\Action{

	protected $resultPageFactory;	
	protected $_customerSession;	
	
	public function __construct(	
		Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	){
		parent::__construct($context);	
		$this->resultPageFactory=$resultPageFactory;
	}
	
    public function execute()
    {		
		if($this->_getSession()->authenticate()){
			$resultPageFactory = $this->resultPageFactory->create();
			$resultPageFactory->getConfig()->getTitle()->set(__('Manage Configurable Product\'s Attribute'));			
			return $resultPageFactory;
		}		
	}	
	
    protected function _getSession()
    {
		$this->_customerSession=$this->_objectManager->get('Magento\Customer\Model\Session');
        return $this->_customerSession;
    }		
}