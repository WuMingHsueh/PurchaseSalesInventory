<?php

namespace PurchaseSalesInventory\Service\Auth;

use Illuminate\Database\Capsule\Manager as DB;
use PurchaseSalesInventory\Models\DataCollection\XINUser;
use PurchaseSalesInventory\Models\DataCollection\UserAuthority;

class AuthSession
{
	private $db;
	private $config;

	public function __construct(DB $db, array $config)
	{
		$this->db = $db;
		$this->config = $config;
	}

	public function storeLogind()
	{
		$_SESSION['user'] = "";
		$_SESSION['token'] = base64_encode(\random_bytes(16));
	}

	public function isLogind(): bool
	{
		return isset($_SESSION['user']) and isset($_SESSION['token']);
	}

	public function logout()
	{
		session_destroy();
	}
}
