<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name'           => 'Tarsicio Carrizales',
            'foto'           => 've-tarsicio.jpg',
            'login'          => 'gerente_tic',
            'email'          => 'telecom.com.ve@gmail.com',
            'password'       => Hash::make('123456'),
            'fechainicio'    => \Carbon\Carbon::now(),
            'fechafin'       => \Carbon\Carbon::now()->addMonth(6),
            'remember_token' => str_random(100)
        ));
    }
}