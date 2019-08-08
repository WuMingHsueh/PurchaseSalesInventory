<?php

namespace PurchaseSalesInventory\Controllers;

use Pimple\Container;
use PurchaseSalesInventory\Models\DataCollection\Customer;
use PurchaseSalesInventory\Models\DataCollection\Delivery;

class Test
{
	private $page;
	private $environment;

	public function __construct(Container $container)
	{
		$this->page = $container['page'];
		$this->environment = $container['settings'];
	}

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

	public function demo($request, $response)
	{
		$layout = [
			"custom"        => "custom-view.php",
			"dashboard"     => "dashboard.php",
			"horizontalFix" => "demo-horizontal-fixed-nav.php",
			"horizontal"    => "demo-horizontal-nav.php",
			"verticalFix"   => "demo-vertical-fixed-nav.php",
			"vertical"      => "demo-vertical-nav.php",
			"form"          => "form.php",
			"login"         => "login.php"
		];
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->layout($this->environment['renderer']['templatePath'] . ($layout[$request->page] ?? "default.php"));
		$this->page->render("");
	}
}
