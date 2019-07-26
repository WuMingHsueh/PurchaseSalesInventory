<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
	protected $primaryKey = 'ReceiptID';
	protected $fillable = [
		'ReceiptID',
		'ReceiptDate',
		'SupplierID',
		'JoinMan',
		'ReceiptType',
		'InvoiceNo',
		'SubTotal',
		'ValueAddTax',
		'Amount',
		'ShipAddress',
		'Comment',
	];
	public $timestamps = false;
}
