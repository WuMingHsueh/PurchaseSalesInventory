<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetails extends Model
{
	protected $table = 'ReceiptDetails';
	protected $primaryKey = ['ReceiptID', 'ReceiptSeq'];
	protected $fillable = [
		'ReceiptID',
		'ReceiptSeq',
		'ProductID',
		'Quantity',
		'UnitPrice',
		'Amount',
	];
	public $timestamps = false;
}
