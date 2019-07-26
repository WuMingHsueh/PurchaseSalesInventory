<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class ProgramsCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		$container = $this->getContainer();
		DB::schema()->create('Programs', function (Blueprint $table) {
			$table->string('ProgramID', 30)->primary();
			$table->string('ProgramName', 30);
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
