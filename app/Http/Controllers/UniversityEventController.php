<?php

namespace Helix\Http\Controllers;

use Illuminate\Http\Request;
use Helix\Contracts\GetUniversityEventsContract;
use Helix\Models\Event;

class UniversityEventController extends Controller
{
    protected $getUniversityEventsContract = null;

    public function __construct(GetUniversityEventsContract $getUniversityEventsContract){
        $this->getUniversityEventsContract = $getUniversityEventsContract;
    }
    public function universityEvents(GetUniversityEventsContract $events){
        return view('pages.dashboard.events', compact('events', $events));
    }

    public function createUniversityEvent($eventName, $startDate, $endDate){
        $event = new Event();
        $event -> event_name = $eventName;
        $event -> start_date = $startDate;
        $event -> end_date = $endDate;
        $event -> save();
    }
}
