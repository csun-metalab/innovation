<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectLikes extends Model
{
    protected $softDelete = true;
    protected $table = 'project_likes';
    protected $fillable = [
        'user_id',
        'project_id',
        'type'
    ];
}
