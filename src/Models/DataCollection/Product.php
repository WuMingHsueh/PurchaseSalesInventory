<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'Product';
	protected $primaryKey = 'ProductID';
	protected $fillable = [
		'ProductID',
		'ProductName',
		'Unit',
		'LastReceiptDate',
		'LastDeliveryDate',
		'StopSales',
		'Price',
		'Stock',
		'Picture',
		'Comment',
	];
	public $timestamps = false;
}
