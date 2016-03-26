<?php
namespace Magebay\Marketplace\Block;
use Magento\Store\Model\ScopeInterface;
class Marketplace extends \Magento\Framework\View\Element\Template
{

    protected $_sellersCollectionFactory;

    protected $_sellersCollection;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magebay\Marketplace\Model\ResourceModel\Sellers\CollectionFactory $sellersCollectionFactory,
        \Magento\Framework\View\Page\Config $postConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_coreRegistry = $coreRegistry;
        $this->_filterProvider = $filterProvider;
        $this->_storeManager = $storeManager;
        $this->_sellersCollectionFactory = $sellersCollectionFactory;
        $this->pageConfig = $postConfig;
    }
    /**
     * Prepare posts collection
     *
     * @return void
     */
    protected function _prepareSellersCollection()
    {
        $this->_sellersCollection = $this->_sellersCollectionFactory->create();
            //->addStoreFilter($this->_storeManager->getStore()->getId())
            //->setOrder('publish_time', 'DESC');

        /*if ($this->getPageSize()) {
            $this->_sellersCollection->setPageSize($this->getPageSize());
        }*/
    }
    public function getSellersCollection()
    {
        if (is_null($this->_sellersCollection)) {
            $this->_prepareSellersCollection();
        }
        return $this->_sellersCollection;
    }	
	
	    
    /**
     * Preparing global layout
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        $this->_addBreadcrumbs();
        $this->pageConfig->getTitle()->set('Magebay Sellers');        
        return parent::_prepareLayout();
    }

    /**
     * Prepare breadcrumbs
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return void
     */
    protected function _addBreadcrumbs()
    {
        if ($this->_scopeConfig->getValue('web/default/show_cms_breadcrumbs', ScopeInterface::SCOPE_STORE)
            && ($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs'))
        ) {
            $breadcrumbsBlock->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Go to Home Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl()
                ]
            );
            $breadcrumbsBlock->addCrumb(
                'sellers',
                [
                    'label' => __('Sellers'),
                    'title' => __(sprintf('Go to Sellers Home Page'))
                ]
            );
        }
    }
}