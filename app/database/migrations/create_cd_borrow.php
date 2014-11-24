<?php 
	class CreateCDBorrow extends Migration {
		public function up()
		{
			Schema::create('cd_borrow',function($table){
				$table->increment('id');
				$table->integer('member_id');
				$table->integer('cd_id');
				$table->timestamp('date_borrowed')->nullable(true);
				$table->timestamp('date_returned')->nullable(true);
				
			});

		}

		public function down()
		{
			Schema::drop('cd_borrow');

		}

	}

 ?>