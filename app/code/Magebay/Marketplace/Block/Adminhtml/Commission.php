<?php
namespace Magebay\Marketplace\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;

class Commission extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_commission';
        $this->_blockGroup = 'Magebay_Marketplace';
        $this->_headerText = __('Manage Seller\'s Commission');
        $this->_addButtonLabel = __('Add Commission');
        parent::_construct();
    }
}