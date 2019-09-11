<?php

use PurchaseSalesInventory\Providers\Exception\PageException;

$routersPages = [
	// ["method" => "get", 'path' => "", "controller" => "", "responseMethod" => "", "viewLayout" => "", "viewRender" => "", "middlewareLayers" => []],
	["method" => "get", 'path' => "/demo/[:page]", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "demo", "middlewareLayers" => []],
	["method" => "get", 'path' => "/download", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "downloadOther", "middlewareLayers" => []],
	["method" => "get", 'path' => "/image", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "getImage", "middlewareLayers" => []],
	["method" => "get", 'path' => "", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "index", "middlewareLayers" => ["PurchaseSalesInventory\Middleware\Auth\Logined"]],
	["method" => "get", 'path' => "/welcome", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "welcome", "middlewareLayers" => []],
	["method" => "get", 'path' => "/error", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "error", "middlewareLayers" => []],
	["method" => "get", 'path' => "/auth/sign-in", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "loginPage", "middlewareLayers" => ["PurchaseSalesInventory\Middleware\Auth\Logouted"]],
	["method" => "post", 'path' => "/auth/sign-in", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "loginProcess", "middlewareLayers" => ["PurchaseSalesInventory\Middleware\CsrfFilter", "PurchaseSalesInventory\Middleware\Auth\Logouted"]],
	["method" => "get", 'path' => "/auth/sign-out", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "logoutProcess", "middlewareLayers" => ["PurchaseSalesInventory\Middleware\Auth\Logined"]],
	["method" => "get", 'path' => "/auth/sign-up", "controller" => "PurchaseSalesInventory\Controllers\Auth\RegisterCtrl", "responseMethod" => "registerPage", "middlewareLayers" => ["PurchaseSalesInventory\Middleware\Auth\Logouted"]],
	["method" => "post", 'path' => "/auth/sign-up", "controller" => "PurchaseSalesInventory\Controllers\Auth\RegisterCtrl", "responseMethod" => "registerProcess", "middlewareLayers" => ["PurchaseSalesInventory\Middleware\CsrfFilter", "PurchaseSalesInventory\Middleware\Auth\Logouted"]],

];

foreach ($routersPages as $routerPage) {
	$klein->respond($routerPage['method'], $routerPage['path'], function ($request, $response, $service) use ($routerPage, &$container) {
		$container['page'] = $service;
		$controller = new $routerPage['controller']($container);
		try {
			// 建立各層middleware物件 並注入相依物件
			$middlewares = \array_map(function ($middlewareClass) use ($container) {
				return new $middlewareClass($container);
			}, $routerPage['middlewareLayers']);

			//將全域middleware 與 區域middleware 組合打包出中介層
			$onion = $container['middleware']->layer($middlewares);

			// 依序執行個中介層邏輯
			return $onion->handle($request, function ($request, $response) use ($controller, $routerPage) {
				return call_user_func([$controller, $routerPage['responseMethod']], $request, $response);
			}, $response);
			$service = $container['page'];
			unset($container['page']);  // 清空Service 以防下一個router使用時發生Service frozen
		} catch (PageException $e) {
			$service->routerRoot = $container['settings']['app']['routerStart'];
			$service->assetPath = $container['settings']['renderer']['assetPath'];
			$service->componentsPath = $container['settings']['renderer']['componentsPath'];
			$service->layout($container['settings']['renderer']['templatePath'] . "error.php");
			$service->render($container['settings']['renderer']['componentsPath'] . 'errors/' . $e->getComponentPath(), [
				'code'      => $e->getCode(),
				'message'   => $e->getMessage(),
				'file'      => $e->getFile(),
				'line'      => $e->getLine(),
				'trace'     => $e->getTraceAsString(),
				'component' => $e->getComponentPath(),
				'data'      => $e->getData()
			]);
		}
	});
}
