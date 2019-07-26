<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class DeliveryDetails extends Model
{
	protected $primaryKey = ['DeliveryID', 'DeliverySeq'];
	protected $fillable = [
		'DeliveryID',
		'DeliverySeq',
		'ProductID',
		'Quantity',
		'UnitPrice',
		'Amount',
	];
	public $timestamps = false;
}
