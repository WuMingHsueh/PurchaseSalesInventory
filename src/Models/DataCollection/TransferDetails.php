<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class TransferDetails extends Model
{
	protected $primaryKey = ['TransferID', 'TransferSeq'];
	protected $fillable = [
		'TransferID',
		'TransferSeq',
		'ProductID',
		'Quantity',
		'Amount',
	];
	public $timestamps = false;
}
