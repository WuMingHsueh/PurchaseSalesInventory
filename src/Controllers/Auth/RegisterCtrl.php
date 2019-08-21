<?php

namespace PurchaseSalesInventory\Controllers\Auth;

use Pimple\Container;
use PurchaseSalesInventory\Models\DataCollection\XINUser;

class RegisterCtrl
{
	private $authService;
	private $csrf;
	private $db;
	private $page;
	private $environment;

	public function __construct(Container &$container)
	{
		$this->authService = $container['AuthService'];
		$this->db = $container['db'];
		$this->csrf = $container['CsrfService'];
		$this->page = $container['page'];
		$this->environment = $container['settings'];
	}

	public function registerPage($request, $response)
	{
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->title = "註冊";
		$this->page->_token = $this->csrf->token();
		$this->page->layout($this->environment['renderer']['templatePath'] . "default.php");
		$this->page->render($this->environment['renderer']['contentsPath'] . "auth/signUp.php");
	}

	public function registerProcess($request, $response)
	{ }
}
