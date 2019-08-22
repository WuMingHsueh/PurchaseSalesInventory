<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class XINUser extends Model
{
	protected $table = 'XINUsers';
	protected $primaryKey = 'EmployeeNo';
	protected $fillable = [
		'EmployeeNo',
		'EmployeeName',
		'PasswordCode',
	];
	public $timestamps = false;
}
