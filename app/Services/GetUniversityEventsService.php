<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\GetUniversityEventsContract;
use Helix\Models\Event;

class GetUniversityEventsService implements GetUniversityEventsContract
{
    public function getUniversityEvents($project_id)
    {
        $events = Event::where('project_id', $project_id)->get();

        return $events;
    }
}
