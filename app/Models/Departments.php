<?php 
namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
	protected $table = 'nemo.departments';
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


}
