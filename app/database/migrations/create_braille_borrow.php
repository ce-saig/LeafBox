<?php 
	class CreateBrailleBorrow extends Migration {
		public function up()
		{
			Schema::create('braille_borrow',function($table){
				$table->increment('id');
				$table->integer('member_id');
				$table->integer('braille_id');
				$table->timestamp('date_borrowed')->nullable(true);
				$table->timestamp('date_returned')->nullable(true);
				
			});

		}

		public function down()
		{
			Schema::drop('braille_borrow');

		}

	}

 ?>