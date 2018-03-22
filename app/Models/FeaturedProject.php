<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedProject extends Model
{
    protected $table = 'helix.featured_project';
    protected $primaryKey = 'project_id';
    public $incrementing = false;
    protected $fillable = [
        'project_id',
        'is_featured',
    ];

    public function project()
    {
        return $this->belongsTo('Helix\Models\Project', 'project_id', 'project_id');
    }
}
