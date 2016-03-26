<?php
namespace Magebay\Marketplace\Block\Product;
class NewProduct extends \Magento\Framework\View\Element\Template{
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,        
        array $data = []		
	){		
		parent::__construct($context, $data);
	}
}