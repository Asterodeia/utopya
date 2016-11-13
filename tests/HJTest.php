<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HJTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        App::setLocale('ot');
        $this->artisan('migrate:refresh', [
            '--seed' => '1'
        ]);
    }

    public function testCreateAccount()
    {
        $this->visit('/')
            ->see('Utopya')
            ->see('Créer un compte')
            ->click('Créer un compte')
            ->seePageIs('/register')
            ->type('Taylor', 'name')
            ->type('taylor@example.com', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Se connecter')
            ->seePageIs('/home')
            ->see('Taylor')
            ->seeInDatabase('users', [
                'email' => 'taylor@example.com'
            ]);
    }

    public function testLogIn()
    {
        $this->visit('/')
            ->seeInDatabase('users', [
                'email' => '1@gmail.com'
            ])
            ->see('Utopya')
            ->see('Login')
            ->click('Login')
            ->seePageIs('/login')
            ->type('1@gmail.com', 'email')
            ->type('secret', 'password')
            ->check('remember');
        $this->press('Se connecter')
            ->seePageIs('/home')
            ->see('User 1');
    }

    public function testLogInWithUnknownUser()
    {
        $this->visit('/')
            ->see('Utopya')
            ->see('Login')
            ->click('Login')
            ->seePageIs('/login')
            ->type('taylor@example.com', 'email')
            ->type('secret', 'password')
            ->check('remember');
        $this->press('Se connecter')
            ->seePageIs('/login')
            ->see('auth.failed');
    }

    public function testCreatePerso()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('/home')
            ->see($user->name)
            ->click('Nouveau personnage')
            ->seePageIs('persos/create')
            ->type('Elfe chadiv', 'nom')
            ->select('Elfe', 'race')
            ->press('Créer')
            ->seePageIs('home')
            ->see('Elfe chadiv');
    }

    public function testCreateExistingPerso()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('/home')
            ->see($user->name)
            ->click('Nouveau personnage')
            ->seePageIs('persos/create')
            ->type('Kheldom', 'nom')
            ->select('Elfe', 'race')
            ->press('Créer')
            ->seePageIs('persos/create')
            ->see('validation.unique');
    }
}
