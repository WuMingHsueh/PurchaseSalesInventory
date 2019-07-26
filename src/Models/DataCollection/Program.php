<?php

namespace PurchaseSalesInventory\Models\DataCollection;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	protected $primaryKey = 'ProgramID';
	protected $fillable = [
		'ProgramID',
		'ProgramName',
	];
	public $timestamps = false;
}
