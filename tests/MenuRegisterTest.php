<?php
/**
 * Created by PhpStorm.
 * User: ismael
 * Date: 30/08/15
 * Time: 22:43
 */

namespace tests;

use TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MenuRegisterTest extends TestCase
{
    use DatabaseMigrations;

    public function testRegisterUser()
    {
        $this->visit('register')
            ->type('test', 'name')
            ->type('test@test.com', 'email')
            ->type('Aa-123456', 'password')
            ->type('Aa-123456', 'password_confirmation')
            ->press('Registrar')
            ->seePageIs('/')
            ->see("Bienvenido a la aplicacion test")
            ->click('Logout')
            ->seePageIs('/');

        // attempt to register the same user
        $this->visit('register')
            ->type('test', 'name')
            ->type('test@test.com', 'email')
            ->type('Aa-123456', 'password')
            ->type('Aa-123456', 'password_confirmation')
            ->press('Registrar')
            ->seePageIs('register');
    }

    public function testRegisterErrorUser()
    {
        $this->visit('register')
            ->type('test', 'name')
            ->type('test@test.com', 'email')
            ->type('Aa-123456', 'password')
            ->type('Aa-', 'password_confirmation')
            ->press('Registrar')
            ->seePageIs('register');
    }
}