<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'src',
    ];

    /**
     * Returns the model instance to which this Image is morphed.
     *
     * @return Person|Project
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
