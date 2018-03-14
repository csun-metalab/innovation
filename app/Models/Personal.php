<?php
namespace Helix\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Personal
 *
 * This is model for personal interests a faculty member could have
 *
 * @package Helix\Models
 */
class Personal extends BaseInterest
{
    protected $table = 'fresco.personal_interests';
    protected $primaryKey = 'attribute_id';
    public $incrementing = false;

    protected $fillable = [
        'attribute_id',
        'title',
        'parent_attribute_id',
        'hierarchy',
        'count'
    ];

    /**
     * Relates this Expertise to all of its associated Person models.
     *
     * @return Builder
     */
    public function people()
    {
        return $this->belongsToMany('Helix\Models\Person', 'fresco.expertise_entity', 'expertise_id', 'entities_id')
            ->where('entities_id', "LIKE", "members:%");
    }
}
