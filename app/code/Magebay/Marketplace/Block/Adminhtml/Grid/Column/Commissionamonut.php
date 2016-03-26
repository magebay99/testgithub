<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;

class Commissionamonut extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateCommissionamonut'];
    }

    public function decorateCommissionamonut($value, $row, $column, $isExport)
    {
        $cell = '<a title="View Customer" target="blank" href="">$5</a>';
        return $cell;
    }
}