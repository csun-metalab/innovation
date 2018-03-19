<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Seeking extends Model
{
    use SoftDeletingTrait;
    protected $table = 'seeking';
    protected $dates = ['deleted_at'];
    protected $fillable = [
            'project_id',
            'title',
            'filled',
        ];
}
