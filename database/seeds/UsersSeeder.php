<?php

use \App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,10)->create();

        factory(User::class)->create([
            'name' => 'José Eduardo',
            'email' => 'jos3duardolopes@gmail.com',

        ]);
    }
}
