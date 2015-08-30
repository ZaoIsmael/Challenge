<?php
/**
 * Created by PhpStorm.
 * User: ismael
 * Date: 30/08/15
 * Time: 18:44
 */

namespace tests;

use TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    public function testMenu()
    {
        $this->visit('/')
            ->see('Haga login para acceder a la aplicación.')
            ->see('Si no tiene cuenta puede registrarse');

        $this->visit('/')
            ->click('Register')
            ->seePageIs('register');

        $this->visit('/')
            ->click('Login')
            ->seePageIs('login');

        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('/')
            ->see("Bienvenido a la aplicacion " .$user->name)
            ->click('Logout')
            ->seePageIs('/')
            ->see('Haga login para acceder a la aplicación.')
            ->see('Si no tiene cuenta puede registrarse');
    }
}