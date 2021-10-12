<?php

use Illuminate\Database\Seeder;
use \App\Models\Seguridad\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=1;$i++){
            for($j=1;$j<=12;$j++) {
                PermissionRole::create(array(
                    'permission_id' => $j,
                    'role_id' => $i
                ));
            }
        }
    }
}
