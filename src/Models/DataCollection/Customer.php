<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'Customer';
	protected $primaryKey = 'CustomerID';
	protected $fillable = [
		'CustomerID',
		'AttribName',
		'CompanyName',
		'EarNo',
		'JoinMan',
		'Tel1',
		'Tel2',
		'Fax',
		'MobilePhone',
		'CompanyAddress',
		'DeliveryAddress',
		'LastDeliveryDate',
		'Comment',
	];
	public $timestamps = false;

	public function Delivery()
	{
		return $this->hasMany('Delivery');
	}
}
