<?php

use Illuminate\Database\Seeder;
use App\Models\Seguridad\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::create(array(
            'role_id'  => 1,
            'user_id'  => 1
        ));
    }
}
