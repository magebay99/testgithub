<?php
namespace Magebay\Marketplace\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;

class Transactions extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_Transactions';
        $this->_blockGroup = 'Magebay_Marketplace';
        $this->_headerText = __('Manage Transaction\'s');
        $this->_addButtonLabel = __('Add Transaction');
        parent::_construct();
    }
}