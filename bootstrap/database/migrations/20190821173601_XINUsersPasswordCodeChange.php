<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class XINUsersPasswordCodeChange extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->dropIfExists('UserAuthority');
		DB::schema()->dropIfExists('XINUsers');
		DB::schema()->create('XINUsers', function (Blueprint $table) {
			$table->string('EmployeeNo', 10)->primary();
			$table->string('EmployeeName', 20);
			$table->string('PasswordCode', 296);
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
