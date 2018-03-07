<?php namespace Helix\Http\Controllers;

use Helix\Http\Controllers\Controller;
use Helix\Http\Requests\Project\Create\StepOneRequest;

use Helix\Models\Interest;
use Helix\Models\Invitation;
use Helix\Models\NemoMembership;
use Helix\Models\Person;

use Helix\Models\Project;
use Helix\Models\ProjectPolicy;
use Helix\Models\Role;
use Helix\Models\Research;
use Helix\Models\Academic;
use Helix\Models\Personal;
use Helix\Models\Purpose;
use Helix\Models\Attribute;
use Helix\Events\Individual\IndividualAddAcademicInterests;
use Helix\Events\Individual\IndividualAddPersonalInterests;
use Helix\Events\Individual\IndividualAddInterests;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Searchy;
use Gate;
use Auth;
use DB;
use Exception;
use Request;

/**
 * Handles the functionality of a logged in faculty member which includes
 * dashboard, interests, and invitations.
 *
 * @package Helix\Http\Controllers
 */
class PersonController extends Controller
{
    /**
     * Implements the "auth" and "faculty" middleware. Every method should only
     * be accessed by logged in faculty members, and not staff members.
     *
     * @return void
     */
    public function __construct()
    {
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

        return view('pages.dashboard.projects',
            compact('projects', 'pendingInvitations'));
    }

    /**
     * This will show the dashboard of research interests for the currently
     * logged in user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboardResearchInterests()
    {
        $currentInterests = auth()->user()->research_interests()->get();

        $categories = Research::whereNull('parent_attribute_id')
            ->pluck('title', 'attribute_id as id');
        $subcategories = Research::where('parent_attribute_id', 'research:1')
            ->pluck('title', 'attribute_id as id');
        $tags = Research::where('parent_attribute_id', 'research:11')
            ->pluck('title', 'attribute_id as id');

        $pendingInvitations = $this->pendingInvitations()->count();

        return view('pages.dashboard.research-interests',
            compact('categories', 'subcategories', 'tags',
                'currentInterests', 'pendingInvitations'));
    }

    /**
     * This will show the dashboard of academic interests for the currently
     * logged in user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboardAcademicInterests()
    {
        $currentInterests = auth()->user()->academic_interests()->get();
        foreach ($currentInterests as $interest) {
            $interest->expertise_id = str_replace_array(':academic', [''],
                $interest->expertise_id);
        }

        $currentInterests->load('research_interest');
        $categories = Research::whereNull('parent_attribute_id')
            ->pluck('title', 'attribute_id as id');
        $subcategories = Research::where('parent_attribute_id', 'research:1')
            ->pluck('title', 'attribute_id as id');
        $tags = Research::where('parent_attribute_id', 'research:11')
            ->pluck('title', 'attribute_id as id');

        $pendingInvitations = $this->pendingInvitations()->count();

        return view('pages.dashboard.academic-interests',
            compact(
                'categories',
                'subcategories',
                'tags',
                'currentInterests',
                'pendingInvitations'));
    }

    /**
     * This will show the dashboard of personal interests for the currently
     * logged in user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboardPersonalInterests()
    {
        $currentInterests = auth()->user()->personal_interests()->get();

        $pendingInvitations = $this->pendingInvitations()->count();

        return view('pages.dashboard.personal-interests',
            compact('currentInterests', 'pendingInvitations'));
    }

    /**
     * This will fire an event to save an individual's research interests.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSaveIndividualInterests()
    {
        // Attempt to make changes to database and return with message
        try {
            if (request('tags')) {
                event(new IndividualAddInterests(
                    auth()->user(), request('tags')));
            }
            return redirect()->back()
                ->with('success', 'Research Interest Successfully Added');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'An Error has Occurred');
        }
    }

    /**
     * This will fire an event to save an individual's academic interests.
     * Note: there is a bunch of string manipulation that is involved with
     * academic to research interests.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSaveIndividualAcademicInterests()
    {
        // Attempt to make changes to database and return with message
        try {
            if (request('tags')) {
                event(new IndividualAddAcademicInterests(auth()->user(),
                    request('tags')));
            }
            return redirect()->back()
                ->with('success', 'Academic Interest Successfully Added');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'An Error has Occurred');
        }
    }

    /**
     * This will fire an event to save an individual's personal interest.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSaveIndividualPersonalInterests()
    {
        // Attempt to make changes to database and return with message
        try {
            if (request('tags')) {
                event(new IndividualAddPersonalInterests(auth()->user(),
                    request('tags')));
            }
            return redirect()->back()
                ->with('success', 'Personal Interest Successfully Added');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'An Error has Occurred');
        }
    }

    /**
     * This will remove the any individual research interest based on id.
     *
     * @param string $id The research interest id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeIndividualInterest($id)
    {
        // Grab variables
        $researchInterest = Research::findOrFail($id);
        $currentUserInterests = auth()->user()->all_interests()->get();

        // Check if the user if remove their own research interest
        if ($currentUserInterests->contains($id)) {
            // Decrements the interest that was removed
            $researchInterest->decrement('count');
            auth()->user()->all_interests()->detach($id);
            return redirect()->back()
                ->with('success', 'Research Interest Successfully Removed.');
        } else {
            return redirect()->back()
                ->with('danger', 'An Error has Occurred.');
        }
    }

    /**
     * This will remove the any individual academic interest based on id. The
     * input string that is a research interest that will get ":academic"
     * appended to it.
     *
     * @param string $id The research interest id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeIndividualAcademicInterest($id)
    {
        // Grab variables
        $researchInterest = Research::findOrFail($id);
        $currentUserInterests = auth()->user()->academic_interests()->get();

        // Check if the user if remove their own research interest
        if ($currentUserInterests->contains('expertise_id', $id.':academic')) {
            Academic::where('expertise_id', $id . ':academic')->delete();
            return redirect()->back()
                ->with('success', 'Academic Interest Successfully Removed.');
        } else {
            return redirect()->back()
                ->with('danger', 'An Error has Occurred.');
        }
    }

    /**
     * This will remove the any individual personal interest based on id.
     *
     * @param string $id The personal interest id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeIndividualPersonalInterest($id)
    {
        // Grab variables
        $researchInterest = Personal::findOrFail($id);
        $currentUserInterests = auth()->user()->personal_interests()->get();

        // Check if the user if remove their own personal interest
        if ($currentUserInterests->contains($id)) {
            auth()->user()->all_interests()->detach($id);
            return redirect()->back()
                ->with('success', 'Personal Interest Successfully Removed.');
        } else {
            return redirect()->back()
                ->with('danger', 'An Error has Occurred.');
        }
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

        return view('pages.dashboard.invitations',
            compact('invitations', 'pendingInvitations'));
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
                        'Lead Principal Investigator'
                    ]
                )
                ->where('individuals_id', auth()->user()->user_id);
            })
            ->whereNull('from_id')
            ->whereNull('updated_at')
            ->get();
    }
}
