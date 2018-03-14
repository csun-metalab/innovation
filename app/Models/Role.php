<?php 
namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	protected $fillable = [];
	protected $primaryKey = "system_name";

	// this must be set for models that do not use an auto-incrementing PK
	public $incrementing = false;

	public function scopeSystemName($q, $int)
	{
		return $q->where('rolename_id', $int)
				->pluck('system_name')
				->first();
	}

	public function scopeRoleNames($q)
	{
		$roleNames = [
            'Lead Principal Investigator', 
            'Principal Investigator', 
            'Co-Principal Investigator',
            'Investigator'
        ];

		return $q->whereIn('display_name', $roleNames)->get();
	}
}