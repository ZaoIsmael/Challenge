<?php
/**
 * Created by PhpStorm.
 * User: ismael
 * Date: 5/09/15
 * Time: 17:42
 */

namespace tests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ResetPasswordTest extends TestCase
{
    use DatabaseMigrations;

    public function testResetPassword()
    {
        $user = $this->createUser();

        $this->visit('password/email')
            ->type($user->email, 'email')
            ->press('Send Password Reset Link')
            ->seePageIs('password/email')
            ->see('We have e-mailed your password reset link!');

        $token = DB::table('password_resets')
            ->select('token')
            ->where('email', $user->email)
            ->get();

        $this->visit('password/reset/'.$token[0]->token)
            ->see('Reset Password')
            ->type($user->email, 'email')
            ->type('newpassword', 'password')
            ->type('newpassword', 'password_confirmation')
            ->press('Cambia la contraseña')
            ->seePageIs('/')
            ->see("Bienvenido a la aplicación ". $user->name);

        $user = DB::table('users')
            ->select('password')
            ->where('email', $user->email)
            ->get();


        $this->assertTrue(
            Hash::check('newpassword', $user[0]->password),
            'The user password was not changed'
        );
    }
}