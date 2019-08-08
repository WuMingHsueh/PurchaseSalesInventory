<?php

namespace PurchaseSalesInventory\Service\Auth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AuthService implements ServiceProviderInterface
{
	public function register(Container $container)
	{
		$container['AuthService'] = function ($c) {
			return new AuthSession($c['db'], $c['settings']);
		};
	}
}
