<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class UserAuthority extends Model
{
	protected $primaryKey = ['EmployeeNo', 'ProgramID'];
	protected $fillable = [
		'EmployeeNo',
		'ProgramID',
		'Run',
		'Append',
		'Edit',
		'Report',
	];
	public $timestamps = false;
}
