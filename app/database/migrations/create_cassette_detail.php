<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

	class CreateCassetteDetail extends Migration {
		public function up()
		{
			Schema::create('cassette_detail',function($table){
				$table->increment('id');
				$table->integer('cassette_id');
				$table->integer('part');
				$table->string('status',50);
				$table->string('note',50);
				
			});

		}

		public function down()
		{
			Schema::drop('cassette_detail');

		}

	}

 ?>