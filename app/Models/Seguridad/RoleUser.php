<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['role_id', 'user_id'];
}
