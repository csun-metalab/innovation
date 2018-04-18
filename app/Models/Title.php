<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'title_name',
        'display_title',
        'application',
    ];
}
