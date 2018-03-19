<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'project_id',
        'event',
    ];
}
