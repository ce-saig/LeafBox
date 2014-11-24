<?php 
	class CreateDVDBorrow extends Migration {
		public function up()
		{
			Schema::create('dvd_borrow',function($table){
				$table->increment('id');
				$table->integer('member_id');
				$table->integer('dvd_id');
				$table->timestamp('date_borrowed')->nullable(true);
				$table->timestamp('date_returned')->nullable(true);
				
			});

		}

		public function down()
		{
			Schema::drop('dvd_borrow');

		}

	}

 ?>