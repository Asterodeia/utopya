<?php

use Illuminate\Database\Seeder;

class PersosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = DB::table('users')
            ->where('email', '=', '1@gmail.com')
            ->select('id')->first();
        $user2 = DB::table('users')
            ->where('email', '=', '2@gmail.com')
            ->select('id')->first();
        $now = date('Y-m-d H:i:s');
        DB::table('persos')->insert([
            'nom' => 'Hémihéli',
            'race' => 'Humain',
            'user_id' => $user1->id,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('persos')->insert([
            'nom' => 'Kheldom',
            'race' => 'Fée',
            'user_id' => $user1->id,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('persos')->insert([
            'nom' => 'Pluhm',
            'race' => 'Elfe',
            'user_id' => $user2->id,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}