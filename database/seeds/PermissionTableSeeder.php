<?php

use Illuminate\Database\Seeder;
use App\Models\Seguridad\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Sección para los USUARIOS DEL SISTEMA
         */

        Permission::create(array(
            'slug'    => 'crear.usuarios',
            'description' => 'Permiso Para Crear Usuario'
        ));

        Permission::create(array(
            'slug'    => 'eliminar.usuarios',
            'description' => 'Permiso Para Eliminar Usuario'
        ));

        Permission::create(array(
            'slug'    => 'ver.usuarios',
            'description' => 'Permiso Para Ver Usuario'
        ));

        Permission::create(array(
            'slug'    => 'modificar.usuarios',
            'description' => 'Permiso Para Modificar Usuario'
        ));

        /**
         * Sección para los ROLES o Perfiles del sistema
         */

        Permission::create(array(
            'slug'    => 'crear.perfiles',
            'description' => 'Permiso Para Crear Perfiles'
        ));

        Permission::create(array(
            'slug'    => 'eliminar.perfiles',
            'description' => 'Permiso Para Eliminar Perfiles'
        ));

        Permission::create(array(
            'slug'    => 'ver.perfiles',
            'description' => 'Permiso Para Ver perfiles'
        ));

        Permission::create(array(
            'slug'    => 'modificar.perfiles',
            'description' => 'Permiso para Modificar perfiles'
        ));

        /**
         * Sección para los Permisos del Sistema
         */

        Permission::create(array(
            'slug'    => 'crear.permisos',
            'description' => 'Para Crear perfiles'
        ));

        Permission::create(array(
            'slug'    => 'eliminar.permisos',
            'description' => 'Para Eliminar Perfiles'
        ));

        Permission::create(array(
            'slug'    => 'ver.permisos',
            'description' => 'Para Ver Perfiles'
        ));

        Permission::create(array(
            'slug'    => 'modificar.permisos',
            'description' => 'Para Modificar Perfiles'
        ));
    }
}
