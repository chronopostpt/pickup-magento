<?php
class Chronopost_Shipping_Model_Checkout_Onepage extends Mage_Checkout_Model_Type_Onepage
{
	public function saveBilling($data, $customerAddressId)
	{
		$pickmeId = $this->getQuote()->getShippingAddress()->getPickmeId();
		$returnValue = parent::saveBilling($data, $customerAddressId);
		$this->getQuote()->getShippingAddress()->setPickmeId($pickmeId)->save();
		return $returnValue;
	}
}