<?php

namespace Helix\Models;

use Helix\Models\BaseInterest;

class AcademicInterest extends BaseInterest
{
    protected $table = 'fresco.teaching_interests';

    protected $primaryKey = 'attribute_id';

    public $incrementing = false;
}
