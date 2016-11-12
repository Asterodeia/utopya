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
        $now = date('Y-m-d H:i:s');
        $lieux = [['Grand place', 'La plus grande place de la ville.'],
            ['La forêt', 'Une forêt à l\'extérieur de la ville.'],
            ['La plage', 'Au bord de la mer']];
        for ($i = 0; $i < count($lieux); $i++) {
            DB::table('lieux')->insert(
                array(
                    'nom' => $lieux[$i][0],
                    'description' => $lieux[$i][1],
                    'created_at' => $now,
                    'updated_at' => $now
                )
            );
        }
        $plage = DB::table('lieux')
            ->where('nom', '=', 'La plage')
            ->select('id')->first();
        for ($i = 0; $i < 2; $i++) {
            DB::table('chapitres')->insert([
                'titre' => 'Chapitre ' . $i,
                'lieu_id' => $plage->id,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
        $chapitre1 = DB::table('chapitres')
            ->where('titre', '=', 'Chapitre 1')
            ->select('id')->first();
        $kheldom = DB::table('persos')
            ->where('nom', '=', 'Kheldom')
            ->select('id')->first();
        for ($i = 0; $i < 2; $i++) {
            DB::table('posts')->insert([
                'titre' => 'Message ' . $i . 'dans chapitre 1',
                'chapitre_id' => $chapitre1->id,
                'auteur_id' => $kheldom->id,
                'texte' => '** Trankil, jme dis, voilou le marlou pépère, tu vas t\'en jeter une pard\'ssus le coude dans la forêt. **
    « Fulululuuu... »
    ** J\'sifflote comme une bigote, héhé pouf pouf ça veut rien dire. **',
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
        $chapitre0 = DB::table('chapitres')
            ->where('titre', '=', 'Chapitre 0')
            ->select('id')->first();
        $emile = DB::table('persos')
            ->where('nom', '=', 'Hémihéli')
            ->select('id')->first();
        DB::table('posts')->insert([
            'titre' => 'Message ' . $i . 'dans chapitre 0',
            'chapitre_id' => $chapitre0->id,
            'auteur_id' => $emile->id,
            'texte' => '** Trankil, jme dis, voilou le marlou pépère, tu vas t\'en jeter une pard\'ssus le coude dans la forêt. **
    « Fulululuuu... »
    ** J\'sifflote comme une bigote, héhé pouf pouf ça veut rien dire. **',
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
