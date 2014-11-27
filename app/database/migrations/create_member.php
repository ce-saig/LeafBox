<?php 
	class CreateMember extends Migration {
		public function up()
		{
			Schema::create('member',function($table){
				$table->increment('id');
				$table->string('name',50);
				$table->string('gender',10);
				$table->text('address');
				$table->string('district',20);
				$table->string('province_postcode',10);
				$table->string('member_status',10);
				$table->string('phone_no',30);
				
			});

		}

		public function down()
		{
			Schema::drop('member');

		}

	}

 ?>