<?php 
	class CreateDVDDetail extends Migration {
		public function up()
		{
			Schema::create('dvd_detail',function($table){
				$table->increment('id');
				$table->integer('dvd_id');
				$table->integer('part');
				$table->string('status',50);
				$table->string('note',50);
				
			});

		}

		public function down()
		{
			Schema::drop('dvd_detail');

		}

	}

 ?>