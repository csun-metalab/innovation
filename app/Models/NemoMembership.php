<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class NemoMembership extends Model
{
    protected $table = 'nemo.memberships';
    protected $fillable = ['parent_entities_id', 'individuals_id', 'role_position', 'member_status'];
    protected $primaryKey = 'parent_entities_id';
    public $incrementing = false;

    protected $appends 	=	['display_name'];

    public function personName()
    {
    	return $this->hasOne('Helix\Models\Person','user_id','individuals_id');
    }

    public function getDisplayNameAttribute()
    {
    	$dn = $this->personName['display_name'];
    	unset($this->personName);
    	return $dn;
    }

    /**
     * This relates a nemo.membership to the nemo.entity table.
     * Currently this is being used to grab the department name from the primary_department call.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department() {
        return $this->hasOne('\Helix\Models\AcademicDepartment', 'entities_id', 'parent_entities_id');
    }
}
