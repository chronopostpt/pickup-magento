<?php
class Chronopost_Shipping_IndexController extends Mage_Core_Controller_Front_Action
{
	public function AjaxAction()
	{
		$shippingCode = $this->getRequest()->getPost('shipping_code');

		if(isset($shippingCode))
		{
			$dropdownBlock = $this->getLayout()->createBlock('chronopost_shipping/onepage_pickmeshops_dropdown');
			$dropdownBlock->setShippingCode($shippingCode);
			$content = $dropdownBlock->toHtml();
			$this->getResponse()->setBody(Mage::helper('core')->jsonEncode(array('dropdownhtml' => $content)));
		}
	}
}