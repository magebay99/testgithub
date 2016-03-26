<?php
namespace Magebay\Marketplace\Controller\Product;
use Magento\Framework\Controller\Result;
use Magento\Framework\View\Result\PageFactory;

abstract class Attribute extends \Magebay\Marketplace\Controller\Product\Action\Action{

    /**
     * @var string
     */
    protected $_entityTypeId;
	
    /**
     * @var \Magento\Framework\Cache\FrontendInterface
     */
    protected $_attributeLabelCache;	
	
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;	
	
	public function __construct(
		//\Magento\Framework\App\Action\Context $context,		
		\Magebay\Marketplace\Controller\Product\Action\Action\Context $context,
		\Magento\Framework\Cache\FrontendInterface $attributeLabelCache,
		\Magento\Framework\Registry $coreRegistry,
		PageFactory $resultPageFactory
	){		
        $this->_coreRegistry = $coreRegistry;
        $this->_attributeLabelCache = $attributeLabelCache;		
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}
	
    /**
     * Generate code from label
     *
     * @param string $label
     * @return string
     */
	 
    protected function generateCode($label)
    {
        $code = substr(
            preg_replace(
                '/[^a-z_0-9]/',
                '_',
                $this->_objectManager->create('Magento\Catalog\Model\Product\Url')->formatUrlKey($label)
            ),
            0,
            30
        );
        $validatorAttrCode = new \Zend_Validate_Regex(['pattern' => '/^[a-z][a-z_0-9]{0,29}[a-z0-9]$/']);
        if (!$validatorAttrCode->isValid($code)) {
            $code = 'attr_' . ($code ?: substr(md5(time()), 0, 8));
        }
        return $code;
    }

    /**
     * Dispatch request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $this->_entityTypeId = $this->_objectManager->create(
            'Magento\Eav\Model\Entity'
        )->setType(
            \Magento\Catalog\Model\Product::ENTITY
        )->getTypeId();
		
        return parent::dispatch($request);
    }	
}