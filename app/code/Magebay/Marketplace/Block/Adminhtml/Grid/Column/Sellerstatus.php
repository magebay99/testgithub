<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;

class Sellerstatus extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateUserstatus'];
    }

    public function decorateUserstatus($value, $row, $column, $isExport)
    {
        if ($row->getUserstatus()) {
            $cell = '<span class="grid-severity-notice"><span>Approved</span></span>';
        } else {
            $cell = '<span class="grid-severity-critical"><span>Disapproved</span></span>';
        }
        return $cell;
    }
}