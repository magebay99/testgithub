<?php
namespace Magebay\Marketplace\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;

class Products extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_products';
        $this->_blockGroup = 'Magebay_Marketplace';
        $this->_headerText = __('Manage Seller\'s Product');
        $this->_addButtonLabel = __('Add Product');
        parent::_construct();
    }
}