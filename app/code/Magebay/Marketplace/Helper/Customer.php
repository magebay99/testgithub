<?php
namespace Magebay\Marketplace\Helper;
 
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\ObjectManagerInterface;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
class Customer extends AbstractHelper
{
	protected $_objectmanager;
	protected $_scopeConfig;
	
	protected $_customerCollectionFactory;
	
    public function __construct(
        Context $context,
		ObjectManagerInterface $objectmanager,
		CollectionFactory $customerCollectionFactory,
        ScopeConfigInterface $scopeConfig	
	){	
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;		
		$this->_objectmanager=$objectmanager;
		$this->_customerCollectionFactory=$_customerCollectionFactory;		
	}
	
	public function checkIsSeller(){
		die('mkmkmkmk');
		/*$flag=false;
		$customerSession=$this->_objectmanager->create('Magento\Customer\Model\Session');
		$_dataObject=$customerSession->getCustomerData();
		$_customerId=$_dataObject->getId();
		$_customerCollection=$this->getSellerById($_customerId);
		if($_customerCollection[0]['is_vendor'])
			$flag=true;
		return $flag;*/
	}
	
	public function getSellerById($id){		
		$sellerCollection=$this->_objectmanager->create('Magebay\Marketplace\Model\ResourceModel\Sellers\Collection')->addFieldToFilter('user_id',$id);
		return $sellerCollection->getData();
	}
}