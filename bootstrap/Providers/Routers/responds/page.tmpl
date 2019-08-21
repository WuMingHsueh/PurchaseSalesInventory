<?php
// ["method" => "get", 'path' => "", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "index", "middlewareLayers" => []],
// ["method" => "get", 'path' => "/error", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "error", "middlewareLayers" => []],
// ["method" => "get", 'path' => "/auth/sign-in", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "loginPage", "middlewareLayers" => []],
// ["method" => "post", 'path' => "/auth/sign-in", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "loginProcess", "middlewareLayers" => []],
// ["method" => "get", 'path' => "/auth/sign-out", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "logoutProcess", "middlewareLayers" => []],
$klein->with('/auth', function () use ($klein, &$container) {
	$controller = new PurchaseSalesInventory\Controllers\Auth\LoginCtrl($container);
	$klein->respond('GET', '/sign-in', function ($request, $response, $service, $app) use (&$controller, &$container) {
		$container['page'] = $service;
		$controller->loginPage($request, $response);
		$service = $container['page'];
		unset($container['page']);
	});
	$klein->respond('post', '/sign-in', function ($request, $response, $service, $app) use (&$controller, &$container) {
		$container['page'] = $service;
		$controller->loginProcess($request, $response);
		$service = $container['page'];
		unset($container['page']);
	});
	$klein->respond('get', '/sign-out', function ($request, $response, $service, $app) use (&$controller, &$container) {
		$container['page'] = $service;
		$controller->logoutProcess($request, $response);
		$service = $container['page'];
		unset($container['page']);
	});
});

$homeCtrl = new PurchaseSalesInventory\Controllers\Home($container);
$klein->responsd('get', '', function ($request, $response, $service, $app) use (&$homeCtrl, &$container) {
	$container['page'] = $service;
	$homeCtrl->index($request, $response);
	$service = $container['page'];
	unset($container['page']);
});
$klein->responsd('get', '/error', function ($request, $response, $service, $app) use (&$homeCtrl, &$container) {
	$container['page'] = $service;
	$homeCtrl->error($request, $response);
	$service = $container['page'];
	unset($container['page']);
});
