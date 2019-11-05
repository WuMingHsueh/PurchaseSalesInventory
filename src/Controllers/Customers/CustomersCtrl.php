<?php

namespace PurchaseSalesInventory\Controllers\Customers;

use Pimple\Container;
use PurchaseSalesInventory\Providers\Exception\PageException;
use PurchaseSalesInventory\Models\DataCollection\Customer;
use PurchaseSalesInventory\Models\DataCollection\Delivery;

class CustomersCtrl
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

	public function pageCustomersList($request, $response)
	{
		$this->page->customers = Customer::select(
			'CustomerID as CustomersId',
			'CompanyName',
			'JoinMan as Contact',
			'Tel1 as Phone',
			'Fax',
			'CompanyAddress as Address'
		)->get();
		$customer = "All Customers";
		$delivery = Delivery::select('DeliveryID', 'DeliveryDate', 'CustomerID');
		if (isset($request->paramsGet()['customerID'])) {
			$customer = Customer::where('CustomerID', $request->paramsGet()['customerID'])
				->select('CompanyName')
				->get()[0]->CompanyName;
			$delivery = $delivery->where('CustomerID', $request->paramsGet()['customerID']);
		}

		$this->page->deliverys = $delivery->get();
		$this->page->customer = $customer;
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->isLogined = $this->authService->isLogind();
		$this->page->navPath = $this->environment['renderer']['componentsPath'] . "pageNavs/customerNav.php";
		$this->page->layout($this->environment['renderer']['templatePath'] . "default.php");
		$this->page->render($this->environment['renderer']['contentsPath'] . "customers/customersList.php");
	}

	public function pageCustomersSingle($request, $response)
	{
		$currentCustomerOrder = $request->paramsGet()['customerOrder'] ?? 0;
		$totalCustomerOrder = Customer::count() - 1;
		$customers = Customer::select('CustomerID as id', 'CompanyName', 'JoinMan', 'Tel1', 'Fax', 'CompanyAddress')->get();
		if (!isset($customers[$currentCustomerOrder])) {
			$currentCustomerOrder = $totalCustomerOrder;
		}
		$customer = $customers[$currentCustomerOrder];
		$delivery = Delivery::select('DeliveryID', 'DeliveryDate', 'CustomerID')
			->where('CustomerID', $customer->CustomerID)
			->get();
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->isLogined = $this->authService->isLogind();
		$this->page->navPath = $this->environment['renderer']['componentsPath'] . "pageNavs/customerNav.php";
		$this->page->layout($this->environment['renderer']['templatePath'] . "default.php");
		$this->page->render(
			$this->environment['renderer']['contentsPath'] . "customers/customersSingle.php",
			[
				'currentCustomerOrder' => $currentCustomerOrder,
				'customerTotal'        => $totalCustomerOrder,
				'customer'             => $customer,
				'deliverys'            => $delivery
			]
		);
	}

	public function pageCustomersDataView($request, $response)
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
