<?php

namespace PurchaseSalesInventory\Providers\Middleware;

use Closure;

interface IMiddlewareLayer
{
	public function handle($request, Closure $next, $response);
}
