<?php
namespace Magebay\Marketplace\Helper;
 
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\ObjectManagerInterface;
use Magento\Store\Model\ScopeInterface;
class Data extends AbstractHelper
{
    const XML_PATH_ENABLED      = 'marketplace/general/enable';
    const XML_PATH_COMMISSION   = 'marketplace/general/percent';
 
   /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;
	
	protected $_objectmanager;
 
    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
		ObjectManagerInterface $objectmanager,
        ScopeConfigInterface $scopeConfig
    ) 
	{
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;
		$this->_objectmanager=$objectmanager;
    }
 
   /**
     * Check for module is enabled in frontend
     *
     * @return bool
     */
    public function isEnabledInFrontend($store = null)
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }
 
   /**
     * Get head title for news list page
     *
     * @return string
     */
    public function getCommission()
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_COMMISSION,
            ScopeInterface::SCOPE_STORE
        );
    }
	
	public function checkIsSeller(){			
		$flag=false;
		$customerSession=$this->_objectmanager->create('Magento\Customer\Model\Session');
		$_dataObject=$customerSession->getCustomerData();
		$_customerId=$_dataObject->getId();
		$_customerCollection=$this->getSellerById($_customerId);
		if(!count($_customerCollection)) return false;
		if($_customerCollection[0]['is_vendor'])
			$flag=true;
		return $flag;
	}
	
	public function getSellerById($id){		
		$sellerCollection=$this->_objectmanager->create('Magebay\Marketplace\Model\ResourceModel\Sellers\Collection')->addFieldToFilter('user_id',$id);
		return $sellerCollection->getData();
	}

	public function checkStoreUrl($storeUrl){
		$sellerCollection=$this->_objectmanager->create('Magebay\Marketplace\Model\ResourceModel\Sellers\Collection')->addFieldToFilter('storeurl',array('like'=>$storeUrl));
		return $sellerCollection->getData();
	}	
}