<?php

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * Columns:
     * id, entity_id, link_type, link, created_at, updated_at
     */

    /**
     * Maps the class to the right table because it's not following naming conventions
     *
     * @var string
     */
    protected $table = 'entity_link';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['entity_id', 'link_type', 'link', 'created_at', 'updated_at'];
}
