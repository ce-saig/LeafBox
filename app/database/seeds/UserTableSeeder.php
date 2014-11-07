<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'nut',
			'username' => 'nutnutnut',
			'email'    => 'nutnutnut@gmail.com',
			'password' => Hash::make('nutnutnut'),
		));
	}

}
