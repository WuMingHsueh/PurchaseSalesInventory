<?php

namespace PurchaseSalesInventory\Controllers;

use Pimple\Container;
use PurchaseSalesInventory\Providers\Exception\PageException;

class Home
{
	private $page;
	private $environment;
	private $authService;

	public function __construct(Container $container)
	{
		$this->page = $container['page'];
		$this->environment = $container['settings'];
		$this->authService = $container['AuthService'];
	}

	public function index($request, $response)
	{
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->isLogined = $this->authService->isLogind();
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

	public function welcome($request, $response)
	{
		$this->page->routerRoot = $this->environment['app']['routerStart'];
		$this->page->assetPath = $this->environment['renderer']['assetPath'];
		$this->page->componentsPath = $this->environment['renderer']['componentsPath'];
		$this->page->layout($this->environment['renderer']['contentsPath'] . "home/welcome.php");
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

	public function downloadOther($request, $response)
	{
		$path = $this->environment['warehouse']['other'] . $request->paramsGet()['filename'];
		if (\file_exists($path)) {
			return $response->file($path);
		} else {
			throw new PageException("file path object not file can't open: ", 404, null,  $path);
		}
	}

	public function getImage($request, $response)
	{
		$path = $this->environment['warehouse']['upload'] . $request->paramsGet()['filename'];
		if (\file_exists($path)) {
			$extension = explode('.', $request->paramsGet()['filename'])[1];
			$ctype = [
				'gif' => 'image/gif',
				'png' => 'image/png',
				'jpg' => 'image/jpg',
				'jpeg' => 'image/jpeg',
			];
			header('Content-type: '. $ctype[$extension]);
			readfile($path);
			return ;
		} else {
			throw new PageException("file path object not file can't open: ", 404, null,  $path);
		}

	}
}
