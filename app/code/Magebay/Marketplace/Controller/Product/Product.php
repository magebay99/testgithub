<?php
namespace Magebay\Marketplace\Controller\Product;

abstract class Product extends \Magebay\Marketplace\Controller\Product\Action\Action
{
    /**
     * @var Product\Builder
     */
    protected $productBuilder;

    /**
     * @param Action\Context $context
     * @param Product\Builder $productBuilder
     */
    public function __construct(
        \Magebay\Marketplace\Controller\Product\Action\Action\Context $context,
        \Magebay\Marketplace\Controller\Product\Builder $productBuilder
    ) {
        $this->productBuilder = $productBuilder;
        parent::__construct($context);
    }

    /**
     * Check for is allowed
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        //return $this->_authorization->isAllowed('Magento_Catalog::products');
		return true;
    }
}