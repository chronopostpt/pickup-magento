<?php
class Chronopost_Shipping_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getPickmeStoreDescription($pickmeId)
	{
		$store = Mage::getModel('pickmeshop/pickmeshop')
			->loadByPickmeId($pickmeId);
		
		return $store->getData('name').' - '.$store->getData('location');
	}
}