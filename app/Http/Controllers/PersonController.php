<?php

declare(strict_types=1);

namespace Helix\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
//use Helix\Http\Requests\Request;
use Helix\Models\Invitation;
use Helix\Models\Project;
use Illuminate\Support\Collection;
use Helix\Models\Event;
use Helix\Contracts\GetUniversityEventsContract;
use Helix\Contracts\CreateUniversityEventContract;
use Illuminate\Support\Facades\Redirect;
use Helix\Http\Requests\UniversityEvent;

/**
 * Handles the functionality of a logged in faculty member which includes
 * dashboard, and invitations.
 */
class PersonController extends Controller
{

    protected $universityEventsRetriever=null;
    protected $universityEventCreator=null;
    /**
     * Implements the "auth" and "faculty" middleware. Every method should only
     * be accessed by logged in faculty members, and not staff members.
     */
    public function __construct(
        GetUniversityEventsContract $universityEventsContract,
        CreateUniversityEventContract $createUniversityEventContract
    )
    {
        $this->universityEventsRetriever = $universityEventsContract;
        $this->universityEventCreator = $createUniversityEventContract;
        $this->middleware(['auth', 'helix-roles']);
    }

    /**
     * This will return the default faculty dashboard view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminPanel()
    {
        // The number of project cards displayed on the dashboard
        $NUM_CARDS_DASHBOARD = 6;

        // If auth user has been granted super privileges
        if (auth()->user()->hasRole('admin')) {
            $projects = Project::with('pi')
                ->orderBy('created_at', 'desc')
                ->paginate($NUM_CARDS_DASHBOARD);
        } else {
            $projects = auth()->user()
                ->load('projects.pi')
                ->projects()
                ->orderBy('created_at', 'desc')
                ->paginate($NUM_CARDS_DASHBOARD);
        }
        $projects->setPath(url('admin/dashboard'));
        $pendingInvitations = $this->pendingInvitations()->count();

        return view(
            'pages.dashboard.projects',
            \compact('projects', 'pendingInvitations')
        );
    }

    /**
     * Returns the view that displays a logged in faculty member's invitations.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboardInvitation()
    {
        $invitations = $this->pendingInvitations();
        $pendingInvitations = $invitations->count();

        return view(
            'pages.dashboard.invitations',
            \compact('invitations', 'pendingInvitations')
        );
    }

    /**
     * This will get a specific faculty member's requested invitations.
     *
     * @return Collection
     */
    private function pendingInvitations()
    {
        return $invitations = Invitation::with('project')
            ->where('recipient_id', auth()->user()->user_id)
            ->whereNotNull('from_id')
            ->whereNull('updated_at')
            ->orwhereHas('memberships', function ($q) {
                $q->whereIn(
                    'role_position',
                    [
                        'Co-Principal Investigator',
                        'Lead Principal Investigator',
                    ]
                )
                ->where('individuals_id', auth()->user()->user_id);
            })
            ->whereNull('from_id')
            ->whereNull('updated_at')
            ->get();
    }

    public function universityEvents(){
       return $this->universityEventsRetriever->getUniversityEvents();
    }

    public function createUniversityEvent(UniversityEvent $request){
        $data = [
            'application' => env('APP_NAME'),
            'originator' => $request['originator'],
            'eventName' => $request['event_name'],
            'startDate' => \Carbon\Carbon::parse($request['start_date'])->format('Y-m-d'),
            'endDate' => \Carbon\Carbon::parse($request['end_date'])->format('Y-m-d'),
            'description' => $request['description']?:null
        ];
        return $this->universityEventCreator->createUniversityEvent($data);
    }

    public function deleteUniversityEvent(Request $request){
        $event_id = $request['id'];
        $event = Event::where('id',$event_id)->first();
        if(is_null($event)){
            return ([
                'message'=>'Event could not be deleted.',
                'success' => 'false'
            ]);
        }
        $event->delete();
        return ([
            'message'=>'Event "'.$event->event_name.'" has been deleted.',
            'success' => 'true'
        ]);
    }
}
