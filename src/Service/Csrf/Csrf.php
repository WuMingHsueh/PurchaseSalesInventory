<?php

namespace PurchaseSalesInventory\Service\Csrf;

class Csrf
{
	private $environment;

	public function __construct($setting)
	{
		$this->environment = $setting;
	}

	public function getTokenSession()
	{
		return $_SESSION['csrf_token'];
	}

	public function token(): string
	{
		$token = $this->generatorToken();
		$_SESSION['csrf_token'] = $token;
		return $token;
	}

	public function verfiyToken($postToken): bool
	{
		return isset($_SESSION['csrf_token']) and $_SESSION['csrf_token'] == $postToken;
	}

	private function generatorToken(): string
	{
		$array = \array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'), ['_']);
		shuffle($array);
		$tokenData = array_slice($array, 0, 20);
		return implode("", $tokenData);
	}
}
