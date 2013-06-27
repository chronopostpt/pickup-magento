<?php
$installer = $this;
$installer->startSetup();
$installer->run("
		CREATE TABLE `{$installer->getTable('pickmeshop/pickmeshop')}` (
		`id_pickme_shop` int(10) unsigned NOT NULL AUTO_INCREMENT,
		`pickme_id` varchar(30) DEFAULT NULL,
		`name` varchar(255) DEFAULT NULL,
		`address` varchar(1000) DEFAULT NULL,
		`location` varchar(400) DEFAULT NULL,
		`postal_code` varchar(20) DEFAULT NULL,
		PRIMARY KEY (`id_pickme_shop`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
");
$installer->getConnection()->addColumn($installer->getTable('sales/quote_address'), 'pickme_id', array(
		'TYPE'      => Varien_Db_Ddl_Table::TYPE_TEXT,
		'LENGTH'    => 30,
		'NULLABLE'  => true,
		'COMMENT'   => 'Chronopost PickMe shop id'
));
$installer->getConnection()->addColumn($installer->getTable('sales/order'), 'pickme_id', array(
		'TYPE'      => Varien_Db_Ddl_Table::TYPE_TEXT,
		'LENGTH'    => 30,
		'NULLABLE'  => true,
		'COMMENT'   => 'Chronopost PickMe shop id'
));
$installer->getConnection()->addColumn($installer->getTable('sales/order_grid'), 'pickme_id', array(
		'TYPE'      => Varien_Db_Ddl_Table::TYPE_TEXT,
		'LENGTH'    => 30,
		'NULLABLE'  => true,
		'COMMENT'   => 'Chronopost PickMe shop id'
));
$installer->getConnection()->addKey($installer->getTable('sales/order_grid'), 'pickme_id_idx', 'pickme_id');
$installer->endSetup();