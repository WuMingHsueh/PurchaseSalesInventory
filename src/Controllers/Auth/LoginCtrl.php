<?php

namespace PurchaseSalesInventory\Controllers\Auth;

use Pimple\Container;
use PurchaseSalesInventory\Models\DataCollection\XINUser;

class LoginCtrl
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

	public function loginPage($request, $response)
	{
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->title = "登入";
		$this->page->_token = $this->csrf->token();
		$this->page->layout($this->environment['renderer']['templatePath'] . "auth.php");
		$this->page->render($this->environment['renderer']['contentsPath'] . "auth/signIn.php");
	}

	public function LoginProcess($request, $response)
	{
		$response->redirect($this->environment['app']['routerStart'])->send();
	}

	public function logoutProcess($request, $response)
	{
		$this->authService->logout();
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->title = "登出";
		$this->page->layout($this->environment['renderer']['templatePath'] . "auth.php");
		$this->page->render($this->environment['renderer']['contentsPath'] . "auth/signIn.php");
	}
}
