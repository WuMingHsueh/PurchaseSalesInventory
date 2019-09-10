<?php

namespace PurchaseSalesInventory\Service\Auth;

use Illuminate\Database\Capsule\Manager as DB;
use ParagonIE\Halite\KeyFactory;
use ParagonIE\Halite\Password;
use ParagonIE\Halite\HiddenString;
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

	public function passwordHash($password): string
	{
		$key = KeyFactory::loadEncryptionKey($this->config['key']['path']);
		return Password::hash(new HiddenString($password), $key);
	}

	public function verifyPassword($account, $password): bool
	{
		$key = KeyFactory::loadEncryptionKey($this->config['key']['path']);
		$employee = XINUser::where('EmployeeNo', $account)->select('EmployeeNo', 'PasswordCode as password')->first();
		return (!empty($employee) and
			Password::verify(new HiddenString($password), $employee->password, $key));
	}

	public function storeLogind($account)
	{
		$_SESSION['user'] = $account;
		$_SESSION['token'] = base64_encode(\random_bytes(16));
	}

	public function isLogind(): bool
	{
		return (isset($_SESSION['user']) and isset($_SESSION['token']));
	}

	public function logout()
	{
		session_destroy();
	}
}
