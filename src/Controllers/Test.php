<?php

namespace PurchaseSalesInventory\Controllers;

use PurchaseSalesInventory\Models\DataCollection\Customer;
use PurchaseSalesInventory\Models\DataCollection\Delivery;

class Test
{
	public function modelInsert($request, $response)
	{
		try {
			Delivery::create([
				'CustomerID' => '190355',
				'DeliveryID' => 'C888541',

			]);
		} catch (\Exception $e) {
			print $e->getMessage();
		}
	}
}
