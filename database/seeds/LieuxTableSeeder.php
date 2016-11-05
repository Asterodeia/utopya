<?php

use Illuminate\Database\Seeder;

class LieuxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lieux')->insert([
            'nom' => 'Grand place',
            'description' => 'La plus grande place de la ville.'
        ]);
        DB::table('lieux')->insert([
            'nom' => 'La forêt',
            'description' => 'Une forêt à l\'extérieur de la ville.'
        ]);
        DB::table('lieux')->insert([
            'nom' => 'La plage',
            'description' => 'Au bord de l\'océan.'
        ]);
    }
}
