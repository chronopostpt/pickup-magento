<?php
class Chronopost_Shipping_Block_Onepage_Pickmeshops extends Mage_Checkout_Block_Onepage_Abstract
{
	public function __construct()
	{
		$this->setTemplate('chronopost_shipping/checkout/onepage/shipping_method/pickmeshops.phtml');
	}

	public function getPostUrl()
	{
		return Mage::getUrl('shipping/index/ajax', array('_secure'=>true));
	}
}