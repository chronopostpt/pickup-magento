<?php
class Chronopost_Shipping_Model_Observer
{
	public function savePickmeshop($observer)
	{
		$postData = $observer->getRequest()->getPost();

		if(isset($postData['pickme_shops']))
		{
			$observer->getQuote()->getShippingAddress()->setPickmeId(
					(empty($postData['pickme_shops'])) ? NULL : $postData['pickme_shops']
			);
		}
	}

	public function copyPickmeshopToQuote($observer)
	{
		$observer->getQuote()->getShippingAddress()->setPickmeId($observer->getOrder()->getPickmeId());
	}

	public function updateOrderCreationQuoteWithPickme($observer)
	{
		$postData = $observer->getRequest();

		if(isset($postData['order']['pickme']))
		{
			$observer->getOrderCreateModel()->getQuote()->getShippingAddress()->setPickmeId(
					(empty($postData['order']['pickme'])) ? NULL : $postData['order']['pickme']);
		}
	}
}