<?php

class Chronopost_Shipping_Model_Carrier_Customrate
extends Mage_Shipping_Model_Carrier_Abstract
implements Mage_Shipping_Model_Carrier_Interface
{
	protected $_code = 'pickme';
	protected $_isFixed = true;

	public function collectRates(Mage_Shipping_Model_Rate_Request $request)
	{

		if (!$this->getConfigFlag('active')) {
			return false;
		}

		$result = Mage::getModel('shipping/rate_result');

		$method = Mage::getModel('shipping/rate_result_method');
		$method->setCarrier('pickme');
		$method->setCarrierTitle($this->getConfigData('title'));
		$method->setMethod('pickme');
		$method->setMethodTitle($this->getConfigData('name'));
		$method->setPrice($this->getConfigData('price_overcost'));

		$result->append($method);

		return $result;
	}

	public function getAllowedMethods()
	{
		return array('pickme' => $this->getConfigData('name'));
	}

	public function getMethodPickmeshops($methodName)
	{
		// no aditional methods for chronopost shipping..
		//$methodModel = Mage::getModel("chronopost_shipping/carrier_method_{$methodName}");
		//return $methodModel->getPickmeshopsOptionArray();
		return $this->getPickmeshopsOptionArray();
	}

	public function getPickmeshopsOptionArray()
	{
		$shopsArray = array();

		$shops = Mage::getModel('pickmeshop/pickmeshop')->getCollection();
		$shops->getSelect()->order( array('location ASC'));

		foreach ($shops as $shop) {
			$shopsArray[$shop->getData('pickme_id')] = $shop->getData('name').' # '.$shop->getData('location').' # '.$shop->getData('address');
		}

		return $shopsArray;
	}
}