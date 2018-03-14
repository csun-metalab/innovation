<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    protected $fillable = ['permission', 'role'];
}
