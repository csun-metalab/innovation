<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'events';
    protected $fillable = [
        'originator',
        'application',
        'event_name',
        'start_date',
        'end_date'
    ];
}
