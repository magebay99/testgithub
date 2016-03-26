<?php
namespace Magebay\Marketplace\Block\Adminhtml\Products\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('products_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Products Information'));
    }
}