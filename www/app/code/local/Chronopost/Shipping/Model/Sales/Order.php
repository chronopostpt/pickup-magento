<?php
class Chronopost_Shipping_Model_Sales_Order extends Mage_Sales_Model_Order
{
    public function getDisplayPickmeStoreDescription()
    {
        return Mage::helper('chronopost_shipping')->getPickmeStoreDescription($this->getPickmeId());
    }
}