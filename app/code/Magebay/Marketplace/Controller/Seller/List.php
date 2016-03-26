<?php
namespace Magebay\Marketplace\Controller\Seller;

class List extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory resultPageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Default customer account page
     *
     * @return void
     */
    public function execute1()
    {
        $resultPageFactory = $this->resultPageFactory->create();
 
        // Add page title
        $resultPageFactory->getConfig()->getTitle()->set(__('Example module'));
 
        // Add breadcrumb
        /** @var \Magento\Theme\Block\Html\Breadcrumbs */
        $breadcrumbs = $resultPageFactory->getLayout()->getBlock('breadcrumbs');
        $breadcrumbs->addCrumb('home',
            [
                'label' => __('Home'),
                'title' => __('Home'),
                'link' => $this->_url->getUrl('')
            ]
        );
        $breadcrumbs->addCrumb('tutorial_example',
            [
                'label' => __('Example'),
                'title' => __('Example')
            ]
        );
 
        return $resultPageFactory;
    }
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }    
}