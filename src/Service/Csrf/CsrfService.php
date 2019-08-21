<?php

namespace PurchaseSalesInventory\Service\Csrf;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CsrfService implements ServiceProviderInterface
{
	public function register(Container $container)
	{
		$container['CsrfService'] = function ($c) {
			return new Csrf($c['settings']);
		};
	}
}
