<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class ReceiptDetailsCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->create('ReceiptDetails', function (Blueprint $table) {
			$table->string('ReceiptID', 10);
			$table->tinyInteger('ReceiptSeq');
			$table->string('ProductID', 10);
			$table->integer('Quantity')->default(0);
			$table->integer('UnitPrice')->default(0);
			$table->integer('Amount')->default(0);

			$table->primary(['ReceiptID', 'ReceiptSeq']);
			$table->foreign('ReceiptID')->references('ReceiptID')->on('Receipt');
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
