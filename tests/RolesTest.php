<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Seguridad\Role;

class RolesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_funcionamiento_rol()
    {
        $role = Role::find(2);
        $this->visit('/login')
            ->see('Inicia')
            ->see('Sistema 2016')
            ->type('telecom.com.ve@gmail.com','email')
            ->type('123456','password')
            ->press('Iniciar Sesión')
            ->seePageIs('/home')
            ->click('Seguridad')
            ->seePageIs('/admin/roles')
            ->see('Admin')
            ->see('Usuario Administrador')


            //->click('Eliminar', $role->id)
        //->seeLink('Modificar')
        //->seeLink('http://localhost:8000/admin/roles/1')
       // ->see('root')
            ->dontSee('Contacto1');
    }
}
