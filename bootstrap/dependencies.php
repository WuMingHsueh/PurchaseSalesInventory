<?php

use Pimple\Container;

$container = new Container();
$container['settings'] = function ($c) {
	return require __DIR__ . '/settings.php';
};
$container->register(new PurchaseSalesInventory\Providers\Database\EloquentProvider);
// $container->register(new PurchaseSalesInventory\Service\Session\SessionService);
