<?php
class Chronopost_Shipping_Block_Onepage_Pickmeshops_Dropdown extends Mage_Checkout_Block_Onepage_Abstract
{
	public function __construct()
	{
		$this->setTemplate('chronopost_shipping/checkout/onepage/shipping_method/pickmeshopsdropdown.phtml');
	}

	protected function _getCarrierMethodCode()
	{
		if(!$this->hasShippingCode())
			$this->setShippingCode($this->getQuote()->getShippingAddress()->getShippingMethod());

		if(trim($this->getShippingCode()) != '')
			$returnValue =  explode('_', $this->getShippingCode());
		else
			$returnValue = false;

		return $returnValue;
	}

	public function getPickmeshopsArrayOptions()
	{
		$returnValue = array();
		$fullCode = $this->_getCarrierMethodCode();
		
		if(is_array($fullCode))
		{
			$carrierModel = Mage::getSingleton('shipping/config')->getCarrierInstance($fullCode[0]);
			$returnValue = $carrierModel->getMethodPickmeshops($fullCode[1]);
		}

		return $returnValue;
	}

	public function getSelectedPickmeshops()
	{
		return $this->getQuote()->getShippingAddress()->getPickmeId();
	}
}