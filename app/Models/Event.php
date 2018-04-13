<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $softDelete = true;
    protected $table = 'events';
    protected $fillable = [
        'originator',
        'event_name',
        'start_date',
        'end_date'
    ];
}
