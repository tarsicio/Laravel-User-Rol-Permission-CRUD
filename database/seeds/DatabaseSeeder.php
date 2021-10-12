<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * El presente Seeder, nos permite inicializar las tablas de Rol, Permisos, Usuarios
         * con sus respectivos detalles, para que al inicio de la instalación se pueda
         * configurar de forma correcta la seguridad de la aplicación, tenemos 3 tablas maestras
         * y tres tablas detalles.
         */
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(PermissionUserTableSeeder::class);
    }
}
