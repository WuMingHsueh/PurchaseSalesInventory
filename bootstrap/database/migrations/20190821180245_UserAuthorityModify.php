<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class UserAuthorityModify extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->dropIfExists('UserAuthority');
		DB::schema()->create('UserAuthority', function (Blueprint $table) {
			$table->string('EmployeeNo', 10);
			$table->string('ProgramID', 30);

			$table->primary(['EmployeeNo', 'ProgramID']);
			$table->foreign('EmployeeNo')->references('EmployeeNo')->on('XINUsers');
			$table->foreign('ProgramID')->references('ProgramID')->on('Programs');
		});
	}

	/**
	 * Undo the migration
	 */
	public function down()
	{
		$container = $this->getContainer();
		DB::schema()->dropIfExists('UserAuthority');
	}
}
