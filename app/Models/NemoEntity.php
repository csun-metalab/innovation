<?php 
namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class NemoEntity extends Model
{
   protected $table = 'nemo.entities';
   protected $primaryKey = 'entities_id';
   protected $fillable = [
      'entities_id', 'parent_entities_id', 'entity_type', 'display_name', 'description', 'record_status'
   ];
   public $incrementing = false;
}
