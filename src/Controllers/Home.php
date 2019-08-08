<?php

namespace PurchaseSalesInventory\Controllers;

use Pimple\Container;

class Home
{
	private $page;
	private $environment;

	public function __construct(Container $container)
	{
		debug_zval_dump($container['csrf']);
		echo "<hr>";
		echo "<hr>";
		echo "<hr>";
		$this->csrf = $container['csrf'];
		$this->page = $container['page'];
		$this->environment = $container['settings'];
	}

	public function index($request, $response)
	{
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->layout($this->environment['renderer']['templatePath'] . "default.php");
		$this->page->render($this->environment['renderer']['contentsPath'] . "home/dashborad.php");
	}

	public function error($request, $response)
	{
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->layout($this->environment['renderer']['templatePath'] . "error.php");
		// $this->page->render($this->page->errorComponent);
		$this->page->render("");
	}

	public function tokenGenerate($request, $response)
	{
		debug_zval_dump($this->csrf);
		echo "<hr>";
		echo "<hr>";
		echo $this->csrf->generateCsrfToken() . "<br>";
		var_dump($this->csrf->getTokenSession());
	}

	public function showToken($request, $response)
	{
		var_dump($this->csrf->getTokenSession());
	}
}
