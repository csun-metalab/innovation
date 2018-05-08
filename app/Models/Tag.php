<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

    protected $table = 'tags';
    protected $fillable = [
        'project_id',
        'tag',
        'relevance',
        'category',
        ];
}
