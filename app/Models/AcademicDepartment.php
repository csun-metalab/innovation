<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class AcademicDepartment extends Model
{
    use Searchable;
    protected $table = 'nemo.academicDepartments';
    protected $primaryKey = 'entities_id';
    public $incrementing = false;
    /*
     * entities_id,
     * parent_entities_id,
     * entity_type,
     * display_name,
     * description,
     * record_status,
     * created_at,
     * updated_at
     */
    public function toSearchableArray()
    {
        $this->department;
        $array = $this->toArray();
        return $array;
    }
    public function people(){
        return $this->belongsToMany(
            $relatedto = 'Helix\Models\Person',
            $through = 'department_user',
            $withforeignKey = 'department_id',
            $andlocalKey = 'entities_id'
        );
    }

    public function department() {
        return $this->belongsToMany(
            'Helix\Models\Departments',
            'nemo.academicDepartment_department',
            'academic_departments_id',
            'departments_id'
        );
    }
}
