<?php
class Chronopost_Shipping_Block_Display_Pickmestore extends Mage_Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('chronopost_shipping/sales/view_pickmestore.phtml');     
    }
 
    public function displayPickmeStore()
    {
    	Mage::getSingleton('core/session')->addNotice('CHRONOPOST_SHIPPIN_BLOCK... displayPickmeStore!!');
    	$displayPickmestore = false;
 
        if($this->getOrder()->getPickmeId() != NULL)
            $displayPickmestore = true;
 
        return $displayPickmestore;
    }
 
    public function getDisplayPickmeStore()
    {
    	Mage::getSingleton('core/session')->addNotice('CHRONOPOST_SHIPPIN_BLOCK... getDisplayPickmeStore!!');
        return $this->getOrder()->getDisplayPickmeStoreDescription();
    }
 
    public function getOrder()
    {
        return Mage::registry('current_order');
    }
}