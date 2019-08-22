<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

class ProgramsDeleteColumeProgramName extends Migration
{
	/**
	 * Do the migration
	 */
	public function up()
	{
		DB::schema()->table('Programs', function (Blueprint $table) {
			$table->dropColumn('ProgramName');
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
