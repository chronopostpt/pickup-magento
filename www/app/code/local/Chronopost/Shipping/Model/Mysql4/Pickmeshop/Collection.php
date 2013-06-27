<?php
class Chronopost_Shipping_Model_Mysql4_Pickmeshop_Collection 
		extends Mage_Core_Model_Mysql4_Collection_Abstract {
	
	public function _construct() {
		parent::_construct();
		$this->_init('pickmeshop/pickmeshop');
	}

	public function delete()
	{
		foreach ($this as $object) {
			$object->delete();
		}
	}
}