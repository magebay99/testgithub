<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;

class Receivedamonut extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateReceivedamonut'];
    }

    public function decorateReceivedamonut($value, $row, $column, $isExport)
    {
        $cell = '<a title="View Customer" target="blank" href="">$240</a>';
        return $cell;
    }
}