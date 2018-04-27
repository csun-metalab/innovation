<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $table = 'attributes';
    protected $primaryKey = 'project_id';
    public $incrementing = false;

	protected $fillable = 
	[
		'project_id',
		'is_featured',
		'seeking_collaborators',
		'seeking_students',
        'event_id',
        'student_qualifications'
	];

	public function project() {
        return $this->belongsTo('Helix\Models\Project','project_id','project_id');
    }

    public function purpose() {
        return $this->hasOne('Helix\Models\Purpose','system_name','purpose_name');
    }

    /* The point of this function is to avoid the edge case where a project used to be seeking
     * qualified students, but now it is  not seeking any students at all. This basically does a quick check first.
     * If the project is seeking students, return their qualifications as a string.
     * else, return null.
     */
    public function getQualifications() {
        return $this->seeking_students ? $this->student_qualifications : null;
    }
    
}

