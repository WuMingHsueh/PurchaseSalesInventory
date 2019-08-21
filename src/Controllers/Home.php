<?php

namespace PurchaseSalesInventory\Controllers;

use Pimple\Container;

class Home
{
	private $page;
	private $environment;

	public function __construct(Container $container)
	{
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

	public function demo($request, $response)
	{
		$layout = [
			"custom"        => "custom-view.php",
			"dashboard"     => "dashboard.php",
			"horizontalFix" => "demo-horizontal-fixed-nav.php",
			"horizontal"    => "demo-horizontal-nav.php",
			"verticalFix"   => "demo-vertical-fixed-nav.php",
			"vertical"      => "demo-vertical-nav.php",
			"form"          => "form.php",
			"login"         => "login.php"
		];
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->layout($this->environment['renderer']['templatePath'] . ($layout[$request->page] ?? "dashboard.php"));
		$this->page->render("");
	}
}
