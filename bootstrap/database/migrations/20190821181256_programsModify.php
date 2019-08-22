<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class ProgramsModify extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->table('Programs', function (Blueprint $table) {
			$table->string('method', 7);
			$table->string('endPoint', 30);
		});
	}

	/**
	 * Undo the migration
	 */
	public function down()
	{
		$container = $this->getContainer();
		DB::schema()->dropIfExists('');
	}
}
