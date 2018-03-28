<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\CreateSeekingContract;
use Helix\Models\Seeking;

class CreateSeekingService implements CreateSeekingContract
{
    public function createSeeking($project_id, $title)
    {
        $seeking = new Seeking();
        $seeking->project_id = $project_id;
        $seeking->title = $title;
        $seeking->save();
    }
}
