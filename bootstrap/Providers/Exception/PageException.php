<?php

namespace PurchaseSalesInventory\Providers\Exception;

class PageException extends \Exception
{
	private $componentPath;
	private $data;

	public function __construct(
		$message,
		$code = 500,
		Exception $previous = null,
		$options = ['componentPath' => "", "data" => []]
	) {
		parent::__construct($message, $code, $previous);
		$this->data = $options['data'];
		$this->componentPath = $options['componentPath'];
	}

	public function getComponentPath()
	{
		return $this->componentPath;
	}

	public function getData()
	{
		return $this->data;
	}
}
