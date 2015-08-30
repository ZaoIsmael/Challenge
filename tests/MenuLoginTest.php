<?php
/**
 * Created by PhpStorm.
 * User: ismael
 * Date: 30/08/15
 * Time: 22:35
 */

namespace tests;

use TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MenuLoginTest extends TestCase
{
    use DatabaseMigrations;

    public function testLoginUser()
    {
        $user = $this->createUser();

        $this->visit('login')
            ->type('ismaelberfer@gmail.com', 'email')
            ->type('Aa-123456', 'password')
            ->press('Login')
            ->seePageIs('/')
            ->see("Bienvenido a la aplicacion " .$user->name);
    }

    public function testLoginUserError()
    {
        $this->visit('login')
            ->type('ismaelberfer@gmail.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('login');
    }
}