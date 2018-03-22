<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class PersonProject extends Model
{
    protected $table = 'person_project';

    protected $appends = ['pi_name'];

    public function getPiNameAttribute()
    {
        return Person::find($this->individuals_id)->display_name;
    }
}
