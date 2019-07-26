<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class ReceiptCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->create('Receipt', function (Blueprint $table) {
			$table->string('ReceiptID', 10);
			$table->date('ReceiptDate')->default(date('Y-m-d'));
			$table->string('SupplierID', 8);
			$table->string('JoinMan', 20)->nullable();
			$table->char('ReceiptType', 1)->default('1');
			$table->string('InvoiceNo', 10)->nullable();
			$table->integer('SubTotal')->default(0);
			$table->integer('ValueAddTax')->default(0);
			$table->integer('Amount')->default(0);
			$table->string('ShipAddress', 50)->nullable();
			$table->text('Comment')->nullable();

			$table->primary('ReceiptID');
			$table->foreign('SupplierID')->references('SupplierID')->on('Supplier');
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
