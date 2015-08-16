<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name'           => 'Ismael Bermúdez',
            'email'          => 'ismaelberfer@gmail.com',
            'password'       => bcrypt('Aa-123456'),
            'remember_token' => str_random(10),
        ]);
        factory(App\User::class, 49)->create();
    }
}
