<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    protected $table = 'visibilities';
    protected $fillable = ['visibility'];
}
