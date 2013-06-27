<?php
class Chronopost_Shipping_Model_Pickmeshop extends Mage_Core_Model_Abstract
{
	public function _construct() {
		parent::_construct();
		$this->_init('pickmeshop/pickmeshop');
	}

	public function loadByPickmeId($pickmeId) {
		$this->_getResource()->loadByPickmeId($this, $pickmeId);
		return $this;
	}
}