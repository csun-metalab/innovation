<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

/**
* This model is used for creating an entity and expertise model association.
*/

class FrescoExpertiseEntity extends Model
{
    protected $table = 'fresco.expertise_entity';
    protected $primaryKey = 'expertise_entity_id';
    protected $fillable = ['expertise_id', 'entities_id'];
    public $incrementing = true;

    public function expertise() {
        return $this->belongsTo('Helix\Models\Expertise', 'expertise_id');
    }

    public function person() {
        return $this->belongsTo('Helix\Models\Person', 'entities_id');
    }
}
