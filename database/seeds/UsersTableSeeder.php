<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => '1@gmail.com',
            'password' => bcrypt('secret'),
        ]);
		
		DB::table('users')->insert([
            'name' => 'User 2',
            'email' => '2@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
