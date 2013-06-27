<?php
class Chronopost_Shipping_Block_Onepage_Progress extends Mage_Checkout_Block_Onepage_Progress
{
	public function getDisplayPickmeStore()
	{
		return Mage::helper('chronopost_shipping')->getPickmeStoreDescription(
				$this->getQuote()->getShippingAddress()->getPickmeId());
	}
}