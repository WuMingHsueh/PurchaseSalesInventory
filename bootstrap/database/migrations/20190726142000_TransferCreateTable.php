<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class TransferCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		$container = $this->getContainer();
		DB::schema()->create('Transfer', function (Blueprint $table) {
			$table->string('TransferID', 10);
			$table->date('TransferDate')->default(DB::raw('CURRENT_DATE'));
			$table->char('TransferType', 1)->default('1');
			$table->string('Description', 20)->nullable();
			$table->integer('Amount')->default(0);
			$table->text('Comment')->nullable();

			$table->primary('TransferID');
		});
	}

	/**
	 * Undo the migration
	 */
	public function down()
	{
		$container = $this->getContainer();
		DB::schema()->dropIfExists('TransferDetails');
		DB::schema()->dropIfExists('Transfer');
	}
}
