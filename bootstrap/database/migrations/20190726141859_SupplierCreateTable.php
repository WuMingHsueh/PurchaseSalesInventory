<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class SupplierCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->create('Supplier', function (Blueprint $table) {
			$table->string('SupplierID', 8);
			$table->string('AttribName', 10);
			$table->string('CompanyName', 50)->nullable();
			$table->string('EarNo', 8)->nullable();
			$table->string('JoinMan', 20)->nullable();
			$table->string('Tel1', 20)->nullable();
			$table->string('Tel2', 20)->nullable();
			$table->string('Fax', 20)->nullable();
			$table->string('MobilePhone', 10)->nullable();
			$table->string('CompanyAddress', 50)->nullable();
			$table->string('DeliveryAddress', 50)->nullable();
			$table->date('LastDeliveryDate')->nullable();
			$table->text('Comment')->nullable();

			$table->primary('SupplierID');
		});
	}

	/**
	 * Undo the migration
	 */
	public function down()
	{
		$container = $this->getContainer();
	}
}
