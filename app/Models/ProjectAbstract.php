<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectAbstract extends Model
{
    protected $table = 'exploration.proposal_abstracts';
    protected $primaryKey = 'proposal_id';
    protected $fillable = [
        'proposal_id', 'publish_abstract', 'abstract',
    ];
}
