<?php 
	class CreateBraille extends Migration {
		public function up()
		{
			Schema::create('braille',function($table){
				$table->increment('id');
				$table->integer('book_id');
				$table->string('reserved',50)->nullable(true);
				$table->string('examiner',50);
				$table->date('produced_date');
				$table->integer('pages');

			});

		}

		public function down()
		{
			Schema::drop('braille');

		}

	}

 ?>