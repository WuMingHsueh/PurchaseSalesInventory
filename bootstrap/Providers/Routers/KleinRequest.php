<?php

namespace PurchaseSalesInventory\Providers\Routers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Klein\Request;

class KleinRequest implements ServiceProviderInterface
{
	/**
	 * Registers services on the given container.
	 *
	 * This method should only be used to configure services and parameters.
	 * It should not get services.
	 *
	 * @param Container $pimple A container instance
	 */
	public function register(Container $container)
	{
		// https://github.com/klein/klein.php/wiki/Sub-Directory-Installation
		// $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($this->container['settings']['app']['routerStart']));

		$container['kleinRequest'] = function ($c) {
			$kleinRequest = Request::createFromGlobals();
			$uri = $kleinRequest->server()->get('REQUEST_URI');
			$kleinRequest->server()->set('REQUEST_URI', substr($uri, strlen($c['settings']['app']['routerStart'])));
			return $kleinRequest;
		};
	}
}
