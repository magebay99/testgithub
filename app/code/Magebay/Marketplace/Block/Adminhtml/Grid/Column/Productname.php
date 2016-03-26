<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;

class Productname extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateProductname'];
    }

    public function decorateProductname($value, $row, $column, $isExport)
    {
        $cell = '<a title="View Customer" target="blank" href="">Test product</a>';
        return $cell;
    }
}