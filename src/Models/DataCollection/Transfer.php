<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
	protected $table = 'Transfer';
	protected $primaryKey = 'TransferID';
	protected $fillable = [
		'TransferID',
		'TransferDate',
		'TransferType',
		'Description',
		'Amount',
		'Comment',
	];
	public $timestamps = false;
}
