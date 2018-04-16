<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\UpdateCollaboratorsContract;
use Helix\Mailers\Mailer;
use Helix\Models\Invitation;
use Helix\Models\Person;
use Helix\Models\Project;
use Helix\Models\NemoMembership;

class UpdateCollaboratorsService implements UpdateCollaboratorsContract
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function updateCollaborators($projectId, array $data)
    {
        $project = Project::findOrFail($projectId);
        // If user has included collaborators
        if (\array_key_exists('collaborators', $data)) {
            // Grab the project's members, if any
            $projectMembers = \array_column($project->allMembers->toArray(), 'user_id');
            $existingMembers = $invitations = $memberIds = [];
            // $collaborator comes in as a string in the format: "name,members:XXXXXXX,role_position"
            foreach ($data['collaborators'] as $collaborator) {
                // $result[0] = display_name, $result[1] = members:XXXXXX, $result[2] = role_position
                $result = \explode('|', $collaborator);
                // Create collab array with intelligible keys for readability purposes
                $collab = [
                    'display_name' => $result[0],
                    'id' => $result[1],
                    'role_position' => $result[2],
                ];

                // If someone has been given a role position of Lead PI or this iteration is auth user
                if ($collab['role_position'] == 'Lead Principal Investigator' || auth()->user()->user_id == $collab['id']) {
                    // Add collaborator to list of users to be synced to nemo.memberships
                    // NOTE: Lead PIs and auth users will not receive invitations, for now...
                    $existingMembers[$collab['id']] = ['role_position' => $collab['role_position']];

                    NemoMembership::create([
                        'parent_entities_id' => $project->project_id,
                        'individuals_id' => $result[1],
                        'role_position' => $result[2],
                        'member_status' => 'Active',
                    ]);

                    // If this iteration has the role of Lead PI
                    if ($collab['role_position'] == 'Lead Principal Investigator') {
                        // Assign that member as PI in exploration.projects
                        $project->pi_members_id = $collab['id'];
                        $project->save();
                    }

                    continue;
                }

                // If the collaborator isn't a member of the project yet
                if (!\in_array($collab['id'], $projectMembers)) {
                    // create an invitation for the new collaborator
                    $invitation = new Invitation([
                        'project_id' => $project->project_id,
                        'from_id' => auth()->user()->user_id,
                        'recipient_id' => $collab['id'],
                        'role_position' => $collab['role_position'],
                        'updated_at' => null,
                    ]);

                    \array_push($memberIds, $collab['id']);
                    \array_push($invitations, $invitation);
                }
                // The user is already a member of the project
                else {
                    // Save record to be synced to project members
                    $existingMembers[$collab['id']] = ['role_position' => $collab['role_position']];
                }
            }

            // Run this code if new people have been invited
            if (\count($invitations)) {
                // query the helix.users table to grab the users by their members id
                $emails = Person::whereIn('user_id', $memberIds)->pluck('email')->toArray();

                $mailData = [
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'feedbackurl' => url('feedback'),
                    'link' => url('project/' . $project->project_id),
                ];

                // Send out emails to new collaborators
                $this->mailer->sendToMany('emails.project_invite', $mailData, $emails, 'You have been invited to join a project!');

                // Save invitations to helix.invitations
                $project->invitations()->saveMany($invitations);
            }

            // Run this code if project has pre-existing members
            if (\count($existingMembers)) {
                // Sync members to nemo.memberships
                $project->allMembers()->sync($existingMembers);
            }
        }
    }
}
