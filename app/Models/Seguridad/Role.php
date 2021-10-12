<?php

namespace App\Models\Seguridad;

use Bican\Roles\Models;

class Role extends Models\Role
{
    //Extiende de la clase Role de Bican y se trae todos los campos de la tabla
    protected $table = 'roles';
    protected $fillable = ['id','slug','description','level'];

    public function permissions(){
        return $this->belongsToMany('\App\Models\Seguridad\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
