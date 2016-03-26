<?php
namespace Magebay\Marketplace\Setup;
 
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
 
        if (version_compare($context->getVersion(), '1.0.2') < 0) {
            // Get multivendor_product table
            $tableName = $setup->getTable('multivendor_product');
            // Check if the table already exists
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                // Declare data
                $data = [
                    [
                        'id' => 2,
                        'product_id' => 2,
                        'user_id' => 2,
                        'store_ids' => 1,
                        'status' => 0,
                        'adminassign' => 1
                    ]
                ];
 
                // Insert data to table
                foreach ($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }
 
        $setup->endSetup();
    }
}