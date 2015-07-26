<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BorrowerTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('borrowers',function($table){
			$table->increments('id');
			$table->string('name',128);
			$table->string('gender',8);
			$table->string('address',128);
			$table->string('district',512);
			$table->smallInteger('province_postcode');
			$table->boolean('member_status');
			$table->string('phone_no',32);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$schema::drop('borrowers');
	}

}
