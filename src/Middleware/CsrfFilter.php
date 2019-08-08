<?php

namespace PurchaseSalesInventory\Middleware;

use PurchaseSalesInventory\Providers\Middleware\IMiddlewareLayer;
use PurchaseSalesInventory\Providers\Exception\PageException;
use Pimple\Container;
use Closure;

class CsrfFilter implements IMiddlewareLayer
{
	private $csrfProvider;
	private $page;
	private $environment;

	public function __construct(Container $container)
	{
		$this->csrfProvider = $container['csrf'];
		$this->page = $container['page'];
		$this->environment = $container['settings'];
	}

	public function handle($request, Closure $next, $response)
	{
		if ($this->csrfProvider->verifyCsrf($request->_token)) {
			return $next($request, $response);
		} else {
			$options = [
				'componentPath' => 'csrf.php',
				'data'         => $this->csrfProvider->getTokenSession()
			];
			throw new PageException("Csrf forbidden", 403, null, $options);
		}
	}
}
