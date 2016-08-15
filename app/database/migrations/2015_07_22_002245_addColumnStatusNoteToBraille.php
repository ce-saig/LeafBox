<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStatusNoteToBraille extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::table('braille', function ($table) {
    		$table->string('notes');
				$table->integer('status');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('braille', function ($table) {
    	$table->dropColumn(['status', 'notes']);
		});
	}

}
