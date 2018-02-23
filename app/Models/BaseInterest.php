<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseInterest extends Model
{
    protected $primaryKey = 'attribute_id';

    public $incrementing = false;
}
