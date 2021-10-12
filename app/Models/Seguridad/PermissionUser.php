<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    protected $table = 'permission_user';
    protected $fillable = ['permission_id', 'role_id'];
    //protected $fillable = ['permission_id', 'role_id', 'user_id'];
}
