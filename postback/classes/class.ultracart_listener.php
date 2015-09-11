<?php
class UltracartListener {
	public $DATA = array();

	function __construct($xml_document) {
		$data = array();
		// Parse the XML Document into a DOM Object
		$doc = new DOMDocument();
		$doc->loadXML($xml_document);

		// Now let's extract and echo out some of the key fields.

		// There should be only one export element, but we're doing this
		// the proper way just in case.
		$exports = $doc->getElementsByTagName("export");
		foreach ($exports as $export) {
			$orders = $export->getElementsByTagName("order");
			
			// Now let's iterate through the order object and extract & echo out some key
			// fields.
			$i = 0;
			foreach($orders as $order) {
				// Basic order info
				$data[$i]['orderId'] = $order->getElementsByTagName("order_id")->item(0)->nodeValue;
				$data[$i]['shipToFirstName'] = $order->getElementsByTagName("ship_to_first_name")->item(0)->nodeValue;
				$data[$i]['shipToLastName'] = $order->getElementsByTagName("ship_to_last_name")->item(0)->nodeValue;
				
				// Now let's get the items and print out some info about them.
				$items = $order->getElementsByTagName("item");
				$j = 0;
				foreach($items as $item) {
					$data[$i]['items'][$j]['itemId'] = $item->getElementsByTagName("item_id")->item(0)->nodeValue;
					$data[$i]['items'][$j]['quantity'] = $item->getElementsByTagName("quantity")->item(0)->nodeValue;
					$data[$i]['items'][$j]['description'] = $item->getElementsByTagName("description")->item(0)->nodeValue;
					$j++;
				}	
				$i++;
			}
		}
		$this->DATA = $data;
	}
}
?>