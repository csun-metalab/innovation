<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class CayusPeople extends Model
{
    protected $table = 'exploration.people';
    protected $primaryKey = 'pid';
    public $incrementing = false;
}
