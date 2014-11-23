<?php 
	class CreateDaisyBorrow extends Migration {
		public function up()
		{
			Schema::create('daisy_borrow',function($table){
				$table->increment('id');
				$table->integer('member_id');
				$table->integer('daisy_id');
				$table->timestamp('date_borrowed')->nullable(true);
				$table->timestamp('date_returned')->nullable(true);
				
			});

		}

		public function down()
		{
			Schema::drop('daisy_borrow');

		}

	}

 ?>