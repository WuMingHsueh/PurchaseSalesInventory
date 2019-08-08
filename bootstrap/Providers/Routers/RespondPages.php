<?php

namespace PurchaseSalesInventory\Providers\Routers;

use Klein\klein;
use Pimple\Container;
use PurchaseSalesInventory\Providers\Exception\PageException;

class RespondPages extends BaseRespond
{
	private $routersPage = [
		// ["method" => "get", 'path' => "", "controller" => "", "responseMethod" => "", "viewLayout" => "", "viewRender" => "", "middlewareLayers" => []],
		["method" => "get", 'path' => "", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "index", "middlewareLayers" => []],
		["method" => "get", 'path' => "/error", "controller" => "PurchaseSalesInventory\Controllers\Home", "responseMethod" => "error", "middlewareLayers" => []],
		["method" => "get", 'path' => "/auth/sign-in", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "loginPage", "middlewareLayers" => []],
		["method" => "post", 'path' => "/auth/sign-in", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "loginProcess", "middlewareLayers" => ["PurchaseSalesInventory\Middleware\CsrfFilter"]],
		["method" => "get", 'path' => "/auth/sign-out", "controller" => "PurchaseSalesInventory\Controllers\Auth\LoginCtrl", "responseMethod" => "logoutProcess", "middlewareLayers" => []],
	];

	public function responds(Container &$container, klein &$klein)
	{
		foreach ($this->routersPage as $routerPage) {
			$klein->respond($routerPage['method'], $routerPage['path'], function ($request, $response, $service) use ($routerPage, &$container) {
				$container['page'] = function ($c) use ($service) {
					return  $service;
				};
				$controller = new $routerPage['controller']($container);
				try {
					if ((empty($routerPage['middlewareLayers']))) {
						call_user_func([$controller, $routerPage['responseMethod']], $request, $response);
					} else {
						$this->provideMiddleware(
							$routerPage['middlewareLayers'],
							$container,
							$request,
							$response,
							$controller,
							$routerPage['responseMethod']
						);
					}
					$service = $container['page'];
					unset($container['page']);  // 清空Service 以防下一個router使用時發生Service frozen
				} catch (PageException $e) {
					$service->routerRoot = $container['settings']['app']['routerStart'];
					$service->assetPath = $container['settings']['renderer']['assetPath'];
					$service->componentsPath = $container['settings']['renderer']['componentsPath'];
					$service->code = $e->getCode();
					$service->layout($container['settings']['renderer']['templatePath'] . "error.php");
					$service->render($container['settings']['renderer']['componentsPath'] . 'errors/' . $e->getComponentPath(), [
						'code'    => $e->getCode(),
						'message' => $e->getMessage(),
						'data'    => $e->getData()
					]);
				} catch (\Throwable $e) {
					$service->routerRoot = $container['settings']['app']['routerStart'];
					$service->assetPath = $container['settings']['renderer']['assetPath'];
					$service->componentsPath = $container['settings']['renderer']['componentsPath'];
					$service->code = $e->getCode();
					$service->layout($container['settings']['renderer']['templatePath'] . "error.php");
					$service->render($container['settings']['renderer']['componentsPath'] . "errors/throwable.php", [
						'code'    => $e->getCode(),
						'message' => $e->getMessage(),
						'file'    => $e->getFile(),
						'line'    => $e->getLine(),
						'trace'      => $e->getTrace()
					]);
				}
			});
		}
	}
}
