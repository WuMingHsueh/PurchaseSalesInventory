<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
	protected $table = 'Delivery';
	protected $primaryKey = 'DeliveryID';
	protected $fillable = [
		'DeliveryID',
		'DeliveryDate',
		'CustomerID',
		'JoinMan',
		'DeliveryType',
		'InvoiceNo',
		'SubTotal',
		'ValueAddTax',
		'Amount',
		'ShipAddress',
		'Comment',
	];
	public $timestamps = false;

	public function Customer()
	{
		return $this->belongsTo('Customer');
	}
}
