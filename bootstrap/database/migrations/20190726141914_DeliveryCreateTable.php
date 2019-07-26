<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class DeliveryCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->create('Delivery', function (Blueprint $table) {
			$table->string('DeliveryID', 10);
			$table->date('DeliveryDate')->default(date('Y-m-d'));
			$table->string('CustomerID', 8);
			$table->string('JoinMan', 20)->nullable();
			$table->char('DeliveryType', 1)->default('1');
			$table->string('InvoiceNo', 10)->nullable();
			$table->integer('SubTotal')->default(0);
			$table->integer('ValueAddTax')->default(0);
			$table->integer('Amount')->default(0);
			$table->string('ShipAddress', 50)->nullable();
			$table->text('Comment')->nullable();

			$table->primary('DeliveryID');
			$table->foreign('CustomerID')->references('CustomerID')->on('Customer');
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
