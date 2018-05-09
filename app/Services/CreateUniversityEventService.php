<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\CreateUniversityEventContract;
use Helix\Models\Event;

class CreateUniversityEventService implements CreateUniversityEventContract{
    public function createUniversityEvent($data)
    {
        $event = new Event();
        $event -> application = $data['application'];
        $event -> originator = $data['originator'];
        $event -> event_name = $data['eventName'];
        $event -> start_date = $data['startDate'];
        $event -> end_date = $data['endDate'];
        $event -> description = $data['description'];
        $event -> save();
        return back();
    }

}
