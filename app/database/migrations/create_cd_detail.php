<?php 
	class CreateCDDetail extends Migration {
		public function up()
		{
			Schema::create('cd_detail',function($table){
				$table->increment('id');
				$table->integer('cd_id');
				$table->integer('part');
				$table->string('status',50);
				$table->string('note',50);
				$table->integer('track_from');
				$table->integer('track_to');				
			});

		}

		public function down()
		{
			Schema::drop('cd_detail');

		}

	}

 ?>