<?php

namespace App\Models\Seguridad;

use Bican\Roles\Models;

class Permission extends Models\Permission
{
    protected $table = 'permissions';
    protected $fillable = ['id','slug','description'];

    public function roles(){
        return $this->belongsToMany('App\Models\Seguridad\Role');
    }
}
