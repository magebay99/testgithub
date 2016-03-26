<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;

class Sellername extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateSellerorders'];
    }

    public function decorateSellerorders($value, $row, $column, $isExport)
    {
        $cell = '<a title="View Customer" target="blank" href="">kien magebay</a>';
        return $cell;
    }
}