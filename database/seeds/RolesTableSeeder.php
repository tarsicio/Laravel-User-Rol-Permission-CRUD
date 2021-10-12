<?php

use Illuminate\Database\Seeder;
use  App\Models\Seguridad\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(array(
            'slug'        => 'ROOT',
            'description' => 'Usuario Super Administrador',
            'level'       => 1
        ));

        Role::create(array(
            'slug'        => 'Admin',
            'description' => 'Usuario Administrador',
            'level'       => 2
        ));
    }
}
