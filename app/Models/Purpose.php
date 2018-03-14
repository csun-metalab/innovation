<?php 
namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $table = 'purpose';
    protected $primaryKey = 'system_name';
    protected $fillable = [
        'system_name',
        'display_name'
    ];
    public $incrementing = false;

    public function attribute() {
        return $this->belongsTo('Helix\Models\Attribute','project_id');
    }

    // Returns the system name of the default purpose. Use this to avoid errors due to hard-coding.
    public static function defaultPurpose(){
        return 'project';
    }
}
