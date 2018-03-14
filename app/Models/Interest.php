<?php

namespace Helix\Models;

use Helix\Models\BaseInterest;

class Interest extends BaseInterest
{
    protected $table = 'fresco.research_interests';

    protected $primaryKey = 'attribute_id';

    public $incrementing = false;
}
