<?php
class Chronopost_Shipping_Block_Adminhtml_Createorder_Pickme
extends Mage_Adminhtml_Block_Sales_Order_Create_Abstract
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('sales_order_create_pickme_form');
	}

	public function getDisplayPickmeStore()
	{
		return Mage::helper('chronopost_shipping')->getPickmeStoreDescription(
				$this->getCreateOrderModel()->getQuote()->getShippingAddress()->getPickmeId());
	}

	public function getPickmeArrayOptions()
	{
		$shopsArray = array();

		$shops = Mage::getModel('pickmeshop/pickmeshop')->getCollection();
		$shops->getSelect()->order( array('location ASC'));

		foreach ($shops as $shop) {
			$shopsArray[$shop->getData('pickme_id')] = $shop->getData('pickme_id').' '.$shop->getData('name').' - '.$shop->getData('location');
		}

		return $shopsArray;
	}
	
	public function getSelectedPickme()
	{
		return $this->getCreateOrderModel()->getQuote()->getShippingAddress()->getPickmeId();
	}
}