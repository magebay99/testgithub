<?php
namespace Magebay\Marketplace\Controller\Seller;
use Magento\Framework\App\Action\Context;
class VerifyUrl extends \Magento\Framework\App\Action\Action{

	protected $_resultJsonFactory;
	
	public function __construct(	
		Context $context,
		\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
	){
		parent::__construct($context);	
		$this->_resultJsonFactory=$resultJsonFactory;
	}
	
	public function execute(){		
		$resultJson = $this->_resultJsonFactory->create();
		$profileurl = $this->getRequest()->getParam('profileurl');
		$response=array();
		$response['status']=true;
		$result=$this->_objectManager->get('Magebay\Marketplace\Helper\Data')->checkStoreUrl($profileurl);
		if(count($result)){
			$response['status']=false;
		}
		
		return $resultJson->setData($response);
	}
		
}