<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Academic.
 *
 * Note: This class is interesting to say the least. This class represents a "model" that's only represented in the
 * pivot table. So, that's why you might see that the table is expertise_entity. We're doing this because the model
 * is just a mapping to the research interest tree. So, throughout the application, you're going to see string
 * manipulation that appends ":academic to table", and whenever there is need to modify the pivot or research table,
 * you'll see the removal of that string.
 */
class Academic extends Model
{
    protected $table = 'fresco.expertise_entity';
    protected $primaryKey = 'expertise_entity_id';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('academic', function (Builder $builder) {
            $builder->where('expertise_id', 'LIKE', '%:academic');
        });
    }

    /**
     * Relates this Expertise to all of its associated Person models.
     *
     * @return Builder
     */
    public function people()
    {
        return $this->belongsToMany('Helix\Models\Person', 'fresco.expertise_entity', 'expertise_id', 'entities_id')
            ->where('entities_id', 'LIKE', 'members:%');
    }
}
