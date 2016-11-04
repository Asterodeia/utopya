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
            'name' => 'User '.str_random(10),
            'email' => '1@gmail.com',
            'password' => bcrypt('secret'),
        ]);
		
		DB::table('users')->insert([
            'name' => 'User '.str_random(10),
            'email' => '2@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
