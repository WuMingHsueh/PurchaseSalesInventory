<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class ProductCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->create('Product', function (Blueprint $table) {
			$table->string('ProductID', 10);
			$table->string('ProductName', 50);
			$table->string('Unit', 4);
			$table->date('LastReceiptDate')->nullable();
			$table->date('LastDeliveryDate')->nullable();
			$table->boolean('StopSales')->default(false);
			$table->integer('Price')->default(0);
			$table->integer('Stock')->default(0);
			$table->string('Picture', 60)->nullable();
			$table->text('Comment')->nullable();

			$table->primary('ProductID');
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
