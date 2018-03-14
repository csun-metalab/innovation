<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Seeking extends Model
{
    protected $table = 'seeking';
    protected $fillable = [
            'project_id',
            'title',
        ];
}
