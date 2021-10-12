<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * El campo slug representa el campo Nombre
     * Se le deja este nombre de campo, ya que en la implementación
     * se utiliza el metodo isRole() del paquete "bican/roles": "2.1.*", dicho metodo trabaja con
     * el campo slug de la tabla Rol para la autenticación, hemos eliminado el campo nombre
     * para hacer la tabla mas pequeña.
     * Se deja el campo Level o Nivel, para dejar pasar a los usuarios por nivel, si este es el caso.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->integer('level')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
