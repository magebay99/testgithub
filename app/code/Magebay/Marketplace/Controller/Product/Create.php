<?php 
namespace Magebay\Marketplace\Controller\Product;
use Magebay\Marketplace\Controller\Product\Action\Action\Context;

class Create extends \Magebay\Marketplace\Controller\Product\Product{
	
	protected $resultPageFactory;	
	protected $_customerSession;	
	
	public function __construct(	
		Context $context,
		\Magebay\Marketplace\Controller\Product\Builder $productBuilder,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	){
		parent::__construct($context, $productBuilder);	
		$this->resultPageFactory=$resultPageFactory;
	}
	
    public function execute()
    {		
		if($this->_getSession()->authenticate()){
			$resultPageFactory = $this->resultPageFactory->create();
			$resultPageFactory->getConfig()->getTitle()->set(__('Marketplace Add New Product'));			
			return $resultPageFactory;
		}		
	}	
	
    protected function _getSession()
    {
		$this->_customerSession=$this->_objectManager->get('Magento\Customer\Model\Session');
        return $this->_customerSession;
    }	
}