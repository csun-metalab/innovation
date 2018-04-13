<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\CreateUniversityEventContract;
use Helix\Models\Event;

class CreateUniversityEventService implements CreateUniversityEventContract{
    public function createUniversityEvent($eventName,$startDate,$endDate,$originator)
    {
        $event = new Event();
        $event -> originator = $originator;
        $event -> event_name = $eventName;
        $event -> start_date = $startDate;
        $event -> end_date = $endDate;
        $event -> save();
        return back();
    }

}
