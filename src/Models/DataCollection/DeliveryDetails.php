<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class DeliveryDetails extends Model
{
	protected $table = 'DeliveryDetails';
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

	public function Delivery()
	{
		return $this->belongsTo('Delivery');
	}

	public function Product()
	{
		return $this->belongsTo('Product');
	}
}
