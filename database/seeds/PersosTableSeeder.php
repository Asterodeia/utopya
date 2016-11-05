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
            'nom' => 'Hémihéli',
            'race' => 'Humain',
            'user_id' => '1'
        ]);

        DB::table('persos')->insert([
            'nom' => 'Kheldom',
            'race' => 'Fée',
            'user_id' => '1'
        ]);

        DB::table('persos')->insert([
            'nom' => 'Pluhm',
            'race' => 'Elfe',
            'user_id' => '2'
        ]);
    }
}