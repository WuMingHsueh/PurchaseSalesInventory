<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class DeliveryDetailsCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->create('DeliveryDetails', function (Blueprint $table) {
			$table->string('DeliveryID', 10);
			$table->tinyInteger('DeliverySeq');
			$table->string('ProductID', 10);
			$table->integer('Quantity')->default(0);
			$table->integer('UnitPrice')->default(0);
			$table->integer('Amount')->default(0);

			$table->primary(['DeliveryID', 'DeliverySeq']);
			$table->foreign('DeliveryID')->references('DeliveryID')->on('Delivery');
			$table->foreign('ProductID')->references('ProductID')->on('Product');
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
