<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Event extends Model
{
    use SoftDeletingTrait;
    protected $table = 'events';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'project_id',
        'event',
        'start_date',
        'end_date'
    ];
}
