<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class XINUsersCreateTable extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		$container = $this->getContainer();
		DB::schema()->create('XINUsers', function (Blueprint $table) {
			$table->string('EmployeeNo', 10)->primary();
			$table->string('EmployeeName', 20);
			$table->string('PasswordCode', 50);
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
