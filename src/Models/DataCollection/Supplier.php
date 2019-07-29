<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	protected $table = 'Supplier';
	protected $primaryKey = 'SupplierID';
	protected $fillable = [
		'SupplierID',
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
}
