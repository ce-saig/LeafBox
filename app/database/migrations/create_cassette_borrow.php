<?php 
	class CreateCassetteBorrow extends Migration {
		public function up()
		{
			Schema::create('cassette_borrow',function($table){
				$table->increment('id');
				$table->integer('member_id');
				$table->integer('cassette_id');
				$table->timestamp('date_borrowed')->nullable(true);
				$table->timestamp('date_returned')->nullable(true);
				
			});

		}

		public function down()
		{
			Schema::drop('cassette_borrow');

		}

	}

 ?>