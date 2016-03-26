<?php
namespace Magebay\Marketplace\Model\ResourceModel;
class Reviews extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Initialize resource model
     * Get tablename from config
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('multivendor_reviews', 'id');
    }


    protected function _beforeDelete(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::_beforeDelete($object);
    }


    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::_beforeSave($object);
    }


    protected function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::_afterSave($object);
    }


    public function load(\Magento\Framework\Model\AbstractModel $object, $value, $field = null)
    {
        return parent::load($object, $value, $field);
    }


    protected function _afterLoad(\Magento\Framework\Model\AbstractModel $object)
    {
        return parent::_afterLoad($object);
    }
}