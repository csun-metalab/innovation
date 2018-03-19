<?php namespace Helix\Http\Controllers;

use Gate;
use Helix\Interfaces\InvitationInterface;
use Helix\Mailers\Mailer;
use Helix\Models\Invitation;
use Helix\Models\NemoMembership;
use Helix\Models\Person;
use Helix\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use Helix\Traits\ReCaptchaTrait;

/**
 * Handles project invitations for student and faculty invitation requests which
 * can be found in the faculty dashboard
 *
 * @package Helix\Http\Controllers
 */
class InvitationController extends Controller
{
    use ReCaptchaTrait;

    /**
     * @var \Helix\Mailers\Mailer mailer
     */
    protected $mailer;

    /**
     * Uses the "auth" and "faculty" middleware.
     *
     * @param Mailer $mailer extends from \Helix\Mailers\Mailer
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        // Checks to see if they're logged in and faculty
        $this->middleware(['auth', 'helix-roles'])
             ->except('studentRequest','processStudentRequest');
        $this->mailer = $mailer;
    }

    /**
     * Checks to see if current user can accept the invitation and updates
     * appropriate tables
     *
     * @param string $projectId The project id where the invitation comes from
     * @param int $inviteId The id of the invitation
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function acceptInvitation($projectId, $inviteId)
    {
        /**
         * Check to see if the auth user has the authority to accept the invitation
         * Check to see if person is already member of project
         * Update helix.invitations table - set accepted = 1 and update timestamp
         * Create record in nemo.memberships table
         * Notify project leaders of acception if auth user is recipient
         * url: project/{projectId}/invitation/{invitationId}/accept
         */
        $invitation = Invitation::findOrFail($inviteId);
        $project    = Project::findOrFail($projectId);
        $person     = Person::findOrFail($invitation->recipient_id);

        if(Gate::denies('accept-or-reject', [$invitation, $project]))
        {
            if(request()->ajax())
            {
                return response()->json(['You are not authorized to perform this action.'], 403);
            }

            return back();
        }

        if($person->isMember($project))
        {
            if(request()->ajax())
            {
                return response()->json(['You are already a member of this project.'], 403);
            }

            return back();
        }

        $invitation->updateAccepted(true);

        NemoMembership::create([
            'parent_entities_id' => $project->project_id,
            'individuals_id'     => $invitation->recipient_id,
            'role_position'      => $invitation->role_position,
            'member_status'      => 'Active'
        ]);

        // Person accepting invitation is recipient so notify project authorities of new member
        if($invitation->recipient_id == auth()->user()->user_id)
        {
            $mailData = [
                'project' => $project,
                'member'  => auth()->user(),
                'feedbackurl' => url('feedback')

            ];

            $emails = $project->authorities->pluck('email')->toArray();

            $this->mailer->sendToMany('emails.new-member', $mailData, $emails, 'A new member has joined your project!');
        }

        if(!request()->ajax())
        {
            session()->flash('flash_message_accept', 'Congratulations, you\'re now a member.');

            return redirect('project/' . $projectId);
        }
    }

    /**
     * Checks to see if current user can reject the invitation and updates
     * appropriate tables
     *
     * @param string $projectId The project id where the invitation comes from
     * @param int $inviteId The id of the invitation
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function rejectInvitation($projectId, $inviteId)
    {
        /*
         * Check to see if auth user has authority to reject the invitation
         * Check to see if person is already member of project
         * Update helix.invitations table - update timestamp, accepted will remain 0
         * Notify project leaders of rejection if auth user is recipient
         * url: project/{projectId}/invitation/{invitationId}/reject
         */
        $invitation = Invitation::findOrFail($inviteId);
        $project    = Project::findOrFail($projectId);
        $person     = Person::findOrFail($invitation->recipient_id);

        if(Gate::denies('accept-or-reject', [$invitation, $project]))
        {
            return back();
        }

        if($person->isMember($project))
        {
            return back();
        }

        $invitation->updateAccepted(false);

        // Person rejecting invitation is recipient so notify project authorities of new member
        if($invitation->recipient_id == auth()->user()->user_id)
        {
            $mailData = [
                'project' => $project,
                'member'  => auth()->user(),
                'feedbackurl' => url('feedback')

            ];

            $emails = $project->authorities->pluck('email')->toArray();

            $this->mailer->sendToMany('emails.rejection', $mailData, $emails, auth()->user()->first_name . ' has declined your project invitation');
        }

        session()->flash('flash_message_decline', 'Thank you for considering.');

        return redirect('project/' . $projectId);
    }

    /**
     * This is run when a faculty member requests to join a project.
     *
     * @param string $projectId The project faculty member would like to join
     * @return \Illuminate\Http\RedirectResponse
     */
    public function selfInvitation($projectId)
    {
        /*
         * Check if project is private - private projects should not allow self invitation
         * Check if project allows self invitations
         * check if invitation exists in helix.invitations table
         * create record in helix.invitations table
         * alert project leaders of self invitation
         * url: project/{projectId}/request
         */

        $project = Project::with('allMembers','attribute')->findOrFail($projectId);

        $redirectToProjectShow = redirect()->route('project.show',['id'=>$projectId]);
        // Check if the currently logged in user is already a member.
        if (auth()->user()->isMember($project))
        {
            //This is supposed to be a session flash, but it doesn't work in Laravel 5.2.
            // Info: https://stackoverflow.com/questions/34648930/laravel-session-flash-message-not-working
            // In the mean time, we will put it into the session  here, and then forget it in the blade file.
            session()->put('alreadyMemberMessage','You are already a member of this project.');
            return $redirectToProjectShow;
        }

        if($project->isPrivate() || !$project->attribute->seeking_collaborators || !$project->isRequestable())
        {
            return $redirectToProjectShow;
        }

        if(Invitation::pending($project, auth()->user())->exists())
        {
            return $redirectToProjectShow;
        }
        Invitation::create([
            'project_id'    => $project->project_id,
            'recipient_id'  => auth()->user()->user_id,
            'role_position' => 'Investigator',
            'updated_at'    => NULL
        ]);

        $mailData = [
            'project' => $project,
            'member'  => auth()->user(),
            'feedbackurl' => url('feedback')
        ];
        $emails = $project->authorities->pluck('email')->toArray();

        $this->mailer->queueToMany('emails.pending-invitation', $mailData, $emails, 'Someone has requested to be part of your project!');

        session()->flash('flash_message_self', 'Thank you for requesting to join this project.');
        return $redirectToProjectShow;
    }

    /*
    * Join the project - no approval required
    * url: project/{projectId}/join
    */
    // public function joinProject($projectId)
    // {
    //     $project = Project::findOrFail($projectId);

    //     if($project->isPrivate())
    //     {
    //         return back();
    //     }

    //     if(!$project->isJoinable())
    //     {
    //         return back();
    //     }

    //     if(auth()->user()->isMember($project))
    //     {
    //         return back();
    //     }

    //     NemoMembership::create([
    //         'parent_entities_id' => $project->project_id,
    //         'individuals_id'     => auth()->user()->user_id,
    //         'role_position'      => 'Investigator',
    //         'member_status'      => 'Active'
    //     ]);

    //     $mailData = [
    //         'project' => $project,
    //         'member'  => auth()->user()
    //     ];

    //     $emails = $project->authorities->pluck('email')->toArray();

    //     $this->mailer->sendToMany('emails.new-member', $mailData, $emails, 'A new member has joined your project!');

    //     session()->flash('flash_message_self', 'You are now a member of this project.');

    //     return redirect('project/' . $projectId);
    // }

    /**
     * Ajax call for Step 3 - Cancelling a pending invitation
     *
     * @param string $projectId Project id of pending invitation
     * @param int $inviteId Invitation id in helix.invitations
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelInvite($projectId, $inviteId)
    {
        // url: {projectId}/invitation/{invitedId}/cancel

        $invitation = Invitation::findOrFail($inviteId);
        $project    = Project::findOrFail($projectId);

        if(Gate::denies('is-owner', $project))
        {
            return response()->json(['error' => 'You are not authorized to perform this action.'], 403);
        }

        $invitation->delete();
    }

    /**
     * This is the function that a student requesting to join a project is going to hit
     *
     * @param string $projectId
     * @return Illuminate\Http\Response
     */
    public function studentRequest($projectId) {
        $project = Project::with('attribute')->findOrFail($projectId);
        return view('pages.project.request-to-join', compact('project'));
    }

    /**
     * Validates the student's request-to-join-project form, checks the reCaptcha,
     * and sends an email to the PI upon success.
     * @param $projectId the ID of the project  that is seeking students.
     * @return View|Redirect  The page to which we send the user after completing the form.
     */
    public function processStudentRequest($projectId) {
        try
        {
            $project = Project::with('pi')
                ->where('project_id',$projectId)
                ->whereHas('attribute',function ($query){
                   $query->where('seeking_students',1);
                })
                ->firstOrFail();
        }
        catch (ModelNotFoundException $e)
        {
            return redirect()->back()->withErrors(['error'=>'The requested project is not seeking students.']);
        }
        $validatorData = request()->except('g-recaptcha-response');
        $validatorData['recaptcha'] = $this->recaptchaCheck();
        $validator = Validator::make($validatorData,[
            'name'                  =>  'Required|Min:3',
            'email'                 =>  'Required|Email|regex:/.+@.*csun\.edu/',
            'subject'               =>  'Required',
            'message'               =>  'Required',
            'recaptcha'             =>  'Required|accepted'
        ], [
            'recaptcha.accepted'    =>  'Please prove you are not a robot.'
        ]);

        if ($validator->fails())
        {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->getMessageBag());
        }
        $student_form = request()->all();
        $feedbackurl = url('feedback');
        //Send the email.
        $mail = $this->mailer->queueToOne(
            'emails.student_request_to_join_project',
            compact('project','student_form', 'feedbackurl'),
            $project->pi->email,
            request('subject')
        );

        return view('pages.project.request-to-join-success')
            ->with(compact('project'));

    }
}
