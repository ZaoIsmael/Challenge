<?php

use App\User;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function createUser()
    {
        return factory(User::class)->create([
            'name'           => 'Ismael Bermúdez',
            'email'          => 'ismaelberfer@gmail.com',
            'password'       => bcrypt('Aa-123456'),
            'remember_token' => str_random(10),
        ]);
    }
}
