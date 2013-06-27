<?php
class Chronopost_Shipping_Model_Mysql4_Pickmeshop extends Mage_Core_Model_Mysql4_Abstract {
	public function _construct() {
		$this->_init('pickmeshop/pickmeshop', 'id_pickme_shop');
	}
	
	public function loadByPickmeId($obj, $pickmeId) {
		$select = $this->_getReadAdapter()->select()
			->from($this->getMainTable())
			->where($this->getMainTable().'.'.'pickme_id'.'=?', $pickmeId);
		
		$obj_id = $this->_getReadAdapter()->fetchOne($select);
		
		if($obj_id)
			$this->load($obj, $obj_id);
		
		return $this;
	}
}