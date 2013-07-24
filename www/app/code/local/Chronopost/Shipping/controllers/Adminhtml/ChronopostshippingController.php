<?php
class Chronopost_Shipping_Adminhtml_ChronopostshippingController
extends Mage_Adminhtml_Controller_Action
{

	public function synchronizeAction()
	{

		try {
			$url_ws = $this->getRequest()->getParam('url_ws');

			if ($url_ws != "") {

				$context = stream_context_create(
					array(
						'ssl' => array(
							'verify_peer' => false,
							'allow_self_signed' => true
						)
					)
				);
				$client = new SoapClient(
					$url_ws,
					array(
						'stream_context' => $context
					)
				);

				$result = $client->getPointList_V3();

				Mage::getModel('pickmeshop/pickmeshop')->getCollection()->delete();
				
				foreach ($result->return->lB2CPointsArr as $message) {

					$shop = Mage::getModel('pickmeshop/pickmeshop');
					$shop->setData('pickme_id',$message->Number);
					$shop->setData('name',$message->Name);
					$shop->setData('address',$message->Address);
					$shop->setData('postal_code',$message->PostalCode);
					$shop->setData('location',$message->PostalCodeLocation);

					$shop->save();
				}

				$result = 1;
			} else {
				$result = 'empty url';
			}
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		Mage::app()->getResponse()->setBody($result);
	}
}