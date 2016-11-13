<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EJTest extends TestCase
{
    use DatabaseMigrations;

    private $user;
    private $perso;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate:refresh', [
            '--seed' => '1'
        ]);
        $this->user = factory(App\User::class)->create();
        $this->perso = $this->user->persos()->save(factory(App\Perso::class)->make());
    }


    public function testPlayPerso()
    {

        $this->actingAs($this->user)
            ->visit('/home')
            ->see($this->user->name)
            ->see($this->perso->nom)
            ->click('Jouer')
            ->seePageIs('ej/home')
            ->see($this->perso->nom)
            ->see('Grand place')
            ->assertSessionHas('perso');
    }

    public function testPlayOtherPerso()
    {
        $this->perso->user->id = 42;
        $this->actingAs($this->user)
            ->withSession(['perso' => $this->perso])
            ->visit('ej/home')
            ->seePageIs('home')
            ->see('Merci de choisir un personnage.');
    }

    public function testCreateChapterInEmptyLieu()
    {
        $this->actingAs($this->user)
            ->withSession(['perso' => $this->perso])
            ->visit('ej/home')
            ->click('Grand place')
            ->seePageIs('ej/lieux/1')
            ->type('Mon chapitre', 'titre')
            ->type('Mon texte', 'texte')
            ->press('Poster')
            ->seePageIs('ej/chapitres/3')
            ->see('Mon chapitre')
            ->see($this->perso->nom)
            ->seeInDatabase('chapitres', ['titre' => 'Mon chapitre']);
    }

    public function testSeeLieuWithChapitres()
    {
        $this->actingAs($this->user)
            ->withSession(['perso' => $this->perso])
            ->visit('ej/home')
            ->click('La plage')
            ->seePageIs('ej/lieux/3')
            ->see('Un message')
            ->see('Hémihéli')
            ->see('Kheldom')
            ->see('2 messages')
            ->see('Créé par')
            ->see('Dernier message');
    }

    public function testCreateNewChapterInNonEmptyLieu()
    {
        $this->actingAs($this->user)
            ->withSession(['perso' => $this->perso])
            ->visit('ej/home')
            ->click('La plage')
            ->seePageIs('ej/lieux/3')
            ->type('Mon chapitre', 'titre')
            ->type('Mon texte', 'texte')
            ->press('Poster')
            ->seePageIs('ej/chapitres/3')
            ->see('Mon chapitre')
            ->see($this->perso->nom)
            ->seeInDatabase('chapitres', ['titre' => 'Mon chapitre']);
    }

    public function testCreateNewPostInExistingChapter()
    {
        $this->actingAs($this->user)
            ->withSession(['perso' => $this->perso])
            ->visit('ej/home')
            ->click('La plage')
            ->seePageIs('ej/lieux/3')
            ->click('Chapitre 1')
            ->type('Mon texte dans le chapitre', 'titre')
            ->type('Mon texte', 'texte')
            ->press('Poster')
            ->seePageIs('ej/chapitres/2')
            ->see('Mon texte dans le chapitre')
            ->see('Mon texte')
            ->see($this->perso->nom)
            ->seeInDatabase('posts', ['titre' => 'Mon texte dans le chapitre']);
    }

}
