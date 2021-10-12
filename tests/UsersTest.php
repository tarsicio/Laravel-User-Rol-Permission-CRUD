<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create_users()
    {
        User::create([
            'name' => 'Maria Jose',
            'login' => 'majo',
            'email' => 'majo.carrizales@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => str_random(100)
        ]);

        $this->seeInDatabase('users', [
            'email' => 'majo.carrizales@gmail.com' ]);
    }
}
