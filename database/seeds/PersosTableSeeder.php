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
        DB::table('persos')->insert([
            'name' => 'Hémihéli',
            'race' => 'Humain',
            'user_id' => '1'
        ]);

        DB::table('persos')->insert([
            'name' => 'Kheldom',
            'race' => 'Fée',
            'user_id' => '1'
        ]);

        DB::table('persos')->insert([
            'name' => 'Pluhm',
            'race' => 'Elfe',
            'user_id' => '2'
        ]);
    }
}