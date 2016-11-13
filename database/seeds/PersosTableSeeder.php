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
        $caracs = ['FO', 'AG', 'CO', 'IG', 'IT', 'CH'];
        $user1 = DB::table('users')
            ->where('email', '=', '1@gmail.com')
            ->select('id')->first();
        $user2 = DB::table('users')
            ->where('email', '=', '2@gmail.com')
            ->select('id')->first();
        $now = date('Y-m-d H:i:s');
        $hemiheli = [
            'nom' => 'Hémihéli',
            'race' => 'Humain',
            'user_id' => $user1->id,
            'created_at' => $now,
            'updated_at' => $now
        ];
        $kheldom = [
            'nom' => 'Kheldom',
            'race' => 'Fée',
            'user_id' => $user1->id,
            'created_at' => $now,
            'updated_at' => $now
        ];
        $pluhm = [
            'nom' => 'Pluhm',
            'race' => 'Elfe',
            'user_id' => $user2->id,
            'created_at' => $now,
            'updated_at' => $now
        ];
        foreach ($caracs as $carac){
            $hemiheli[$carac] = random_int(1,100);
            $kheldom[$carac] = random_int(1,100);
            $pluhm[$carac] = random_int(1,100);
        }
        DB::table('persos')->insert($hemiheli);
        DB::table('persos')->insert($kheldom);
        DB::table('persos')->insert($pluhm);
    }
}