<?php
namespace Magebay\Marketplace\Setup;
 
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class InstallData implements InstallDataInterface
{
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
 
        // Get multivendor_product table
        $tableName = $setup->getTable('multivendor_product');
        // Check if the table already exists
        if ($setup->getConnection()->isTableExists($tableName) == true) {
            // Declare data
            $data = [
                [
                    'id' => 1,
                    'product_id' => 1,
                    'user_id' => 1,
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
 
        $setup->endSetup();
    }
}