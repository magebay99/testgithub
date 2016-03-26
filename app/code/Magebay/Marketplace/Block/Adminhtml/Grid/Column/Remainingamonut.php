<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;

class Remainingamonut extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateRemainingamonut'];
    }

    public function decorateRemainingamonut($value, $row, $column, $isExport)
    {
        $cell = '<a title="View Customer" target="blank" href="">$120</a>';
        return $cell;
    }
}