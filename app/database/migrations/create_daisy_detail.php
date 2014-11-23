<?php 
	class CreateDaisyDetail extends Migration {
		public function up()
		{
			Schema::create('daisy_detail',function($table){
				$table->increment('id');
				$table->integer('daisy_id');
				$table->integer('part');
				$table->string('status',50);
				$table->string('note',50);
				
			});

		}

		public function down()
		{
			Schema::drop('daisy_detail');

		}

	}

 ?>