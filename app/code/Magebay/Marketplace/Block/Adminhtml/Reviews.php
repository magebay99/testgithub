<?php
namespace Magebay\Marketplace\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;

class Reviews extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_reviews';
        $this->_blockGroup = 'Magebay_Marketplace';
        $this->_headerText = __('Manage Reviews And Ratings');
        $this->_addButtonLabel = __('Add Review');
        parent::_construct();
    }
}