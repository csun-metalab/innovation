<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyType extends Model
{
    protected $table = 'policy_types';
    protected $fillable = ['policy_type'];
}
