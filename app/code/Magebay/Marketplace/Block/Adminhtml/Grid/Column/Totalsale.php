<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;

class Totalsale extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateTotalsale'];
    }

    public function decorateTotalsale($value, $row, $column, $isExport)
    {
        $cell = '<a title="View Customer" target="blank" href="">$13.489</a>';
        return $cell;
    }
}