<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

	class CreateBook extends Migration {
		public function up()
		{
			Schema::create('book',function($table){
				$table->increment('id');
				$table->string('isbn',13);
				$table->string('title',200);
				$table->string('author',50)->nullable(true);
				$table->string('translate',50)->nullable(true);
				$table->string('grade',50)->nullable(true);
				$table->string('bm_status',50)->nullable(true);
				$table->string('bm_note',50)->nullable(true);
				$table->timestamp('bm_date')->nullable(true);
				$table->string('setcm_status',50)->nullable(true);
				$table->string('setcm_note',50)->nullable(true);
				$table->timestamp('setcm_date')->nullable(true);
				$table->string('setdm_status',50)->nullable(true);
				$table->string('setdm_note',50)->nullable(true);
				$table->timestamp('setdm_date')->nullable(true);
				$table->string('setcd_status',50)->nullable(true);
				$table->string('setcd_note',50)->nullable(true);
				$table->timestamp('setcd_date')->nullable(true);
				$table->string('setdvd_status',50)->nullable(true);
				$table->string('setdvd_note',50)->nullable(true);
				$table->timestamp('setdvd_date')->nullable(true);
				$table->text('abstract');				
				$table->string('book_type',20);
				$table->string('produce_no',20);
				$table->string('original_no',20);
				$table->integer('pub_year');
				$table->integer('pub_no');
				$table->string('publisher',50);
				$table->string('btype',50);
				$table->timestamps();
				
			});

		}

		public function down()
		{
			Schema::drop('book');

		}

	}

 ?>