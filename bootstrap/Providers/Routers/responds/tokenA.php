<?php
$klein->with('/token', function () use ($klein, &$container) {
	$klein->respond('GET', '/a', function ($request, $response, $service, $app) use ($klein, &$controller, &$container) {
		$container['fuck'] = function ($c) {
			return "fuck";
		};
		// $controller->tokenGenerate($request, $response);
	});
	$klein->respond('get', '/b', function ($request, $response, $service, $app) use ($klein, &$controller, &$container) {
		return $container['fuck'];
		// $controller->showToken($request, $response);
	});
	unset($container['page']);
});
