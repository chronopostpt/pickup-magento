<?php

class Chronopost_Shipping_Block_Adminhtml_System_Config_Form_Button extends Mage_Adminhtml_Block_System_Config_Form_Field
{
	protected function _construct()
	{
		parent::_construct();
		$this->setTemplate('chronopost/system/config/button.phtml');
	}

	protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
	{
		return $this->_toHtml();
	}

	public function getAjaxSynchronizeUrl()
	{
		return Mage::helper('adminhtml')->getUrl('adminhtml/adminhtml_chronopostshipping/synchronize');
	}

	public function getButtonHtml()
	{
		$button = $this->getLayout()->createBlock('adminhtml/widget_button')
		->setData(array(
				'id'        => 'chronopostshipping_button',
				'label'     => $this->helper('adminhtml')->__('Synchronize'),
				'onclick'   => 'javascript:synchronize(); return false;'
		));

		return $button->toHtml();
	}
}