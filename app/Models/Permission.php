<?php

namespace Helix\models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['system_name', 'display_name'];
}
