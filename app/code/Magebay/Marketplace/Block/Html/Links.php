<?php
namespace Magebay\Marketplace\Block\Html;

class Links extends \Magento\Framework\View\Element\Template {
	
	protected $_objectManager;
	protected $_customerInfo;
	
	public function __construct(
		//\Magebay\Marketplace\Block\Context $context,		
		\Magento\Framework\View\Element\Template\Context $context,
		//\Magebay\Marketplace\Model\Sellers $customerInfo,
		array $data = []
	){
		parent::__construct($context, $data);
		//$this->_customerInfo=$customerInfo;
		//parent::__construct($context, $data);
		//$this->_objectManager=$context->getObjectManager();
	}
	
	public function checkIsSeller(){
		//$result=$this->_objectManager->get('Magebay\Marketplace\Helper\Customer')->checkIsSeller1();		
		//return $this->_objectManager->get('Magebay\Marketplace\Helper\Customer')->checkIsSeller();
		return true;
	}
}