<?php

namespace PurchaseSalesInventory\Middleware\Auth;

use PurchaseSalesInventory\Providers\Middleware\IMiddlewareLayer;
use PurchaseSalesInventory\Providers\Exception\PageException;
use Pimple\Container;
use Closure;

class Logined implements IMiddlewareLayer {

	private $auth;
	private $page;
	private $environment;

	public function __construct(Container $container)
	{
		$this->auth = $container['AuthService'];
		$this->page = $container['page'];
		$this->environment = $container['settings'];
	}

	public function handle($request, Closure $next, $response)
	{
		if ($this->auth->isLogind()) {
			return $next($request, $response);
		} else {
			throw new PageException("Your need to Login to access: ", 403, null,  @$_SESSION['user']);
		}
	}
}
