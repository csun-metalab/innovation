<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $table = 'terms';
    
    public function scopeAcademicYear($query)
    {
    	return $query->where('term_id','NOT LIKE', "%1")->where('term_id','NOT LIKE', "%5");
    }
}
