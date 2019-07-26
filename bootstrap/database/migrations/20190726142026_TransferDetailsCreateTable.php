<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class TransferDetailsCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		$container = $this->getContainer();
		DB::schema()->create('TransferDetails', function (Blueprint $table) {
			$table->string('TransferID', 10);
			$table->tinyInteger('TransferSeq');
			$table->string('ProductID', 10);
			$table->integer('Quantity')->default(0);
			$table->integer('Amount')->default(0);

			$table->primary(['TransferID', 'TransferSeq']);
			$table->foreign('TransferID')->references('TransferID')->on('Transfer');
			$table->foreign('ProductID')->references('ProductID')->on('Product');
		});
	}

	/**
	 * Undo the migration
	 */
	public function down()
	{
		$container = $this->getContainer();
		DB::schema()->dropIfExists('TransferDetails');
	}
}
