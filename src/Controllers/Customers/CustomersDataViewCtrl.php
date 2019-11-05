<?php

namespace PurchaseSalesInventory\Controllers\Customers;

use Pimple\Container;
use PurchaseSalesInventory\Providers\Exception\PageException;
use PurchaseSalesInventory\Models\DataCollection\Customer;

class CustomersDataViewCtrl
{
	private $page;
	private $environment;
	private $authService;

	public function __construct(Container $container)
	{
		$this->page = $container['page'];
		$this->environment = $container['settings'];
		$this->authService = $container['AuthService'];
	}

	public function page($request, $response)
	{
		$customers = Customer::select(
			'CustomerID as ID',
			'CompanyName',
			'JoinMan as Contact',
			'Tel1 as Phone',
			'Fax',
			'CompanyAddress as Address'
		);
		$customers = $customers->get();

		$totalCustomerOrder = count($customers) - 1;
		$currentCustomerOrder = $request->paramsGet()['customerOrder'] ?? 0;
		if (!isset($customers[$currentCustomerOrder])) {
			$currentCustomerOrder = $totalCustomerOrder;
		}
		$customer = $customers[$currentCustomerOrder];

		if (isset($request->paramsGet()['customerOrder'])) {
			$_SESSION['CustomerDataViewListChanged'][] = $customer->ID;
		}
		$this->page->customers = $customers;
		$this->page->customer = $customer;
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->isLogined = $this->authService->isLogind();
		$this->page->navPath = $this->environment['renderer']['componentsPath'] . "pageNavs/customerNav.php";
		$this->page->layout($this->environment['renderer']['templatePath'] . "default.php");
		$this->page->render(
			$this->environment['renderer']['contentsPath'] . "customers/customersDataView.php",
			[
				'currentCustomerOrder' => $currentCustomerOrder,
				'customerTotal'        => $totalCustomerOrder,
				'customer'             => $customer,
				'listChanged'          => @$_SESSION['CustomerDataViewListChanged']
			]
		);
	}
}
