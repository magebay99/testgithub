<?php
namespace Magebay\Marketplace\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;

class Sellers extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_sellers';
        $this->_blockGroup = 'Magebay_Marketplace';
        $this->_headerText = __('Manage Seller\'s');
        $this->_addButtonLabel = __('Add Seller');
        parent::_construct();
    }
}