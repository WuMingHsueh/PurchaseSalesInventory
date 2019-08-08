<?php

namespace PurchaseSalesInventory\Service\Auth;

use Illuminate\Database\Capsule\Manager as DB;
use PurchaseSalesInventory\Models\DataCollection\XINUser;
use PurchaseSalesInventory\Models\DataCollection\UserAuthority;

class AuthSession
{
	private $db;
	private $config;

	private $loginData;

	public function __construct(DB $db, array $config)
	{
		$this->db = $db;
		$this->config = $config;
	}

	public function getLoginData()
	{
		return ($this->isLogind()) ? $this->loginData[\session_id()] : false;
	}

	public function storeLogind()
	{
		$this->loginData[\session_id()] = [
			"user"  => "",
			"token" => base64_encode(\random_bytes(16))
		];
	}

	public function isLogind(): bool
	{
		return (isset($this->loginData) and
			isset($this->loginData[\session_id()]) and
			isset($this->loginData[\session_id()]['user']));
	}

	public function logout()
	{
		unset($this->loginData);
	}
}
