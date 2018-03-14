<?php

namespace Helix\Listeners\Project;

use Helix\Models\ProjectPolicy;
use Helix\Events\Project\ProjectCreatedOrUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProjectPolicy
{
    public function handle(ProjectCreatedOrUpdated $event)
    {
        // Grab permission level for the project
        $projectPolicies = $event->project->getSelectedPolicies($event->session['project_general']['project_type']);

        // Project already has policies so update them
        if(count($event->project->policies) > 0)
        {
            ProjectPolicy::invitationPolicy($event->project)->update([
                'policy' => $projectPolicies['invitation']
            ]);
            ProjectPolicy::approvalPolicy($event->project)->update([
                'policy' => $projectPolicies['approval']
            ]);
            ProjectPolicy::visibilityPolicy($event->project)->update([
                'policy' => $projectPolicies['visibility']
            ]);
        }
        // No project policies exist so create them
        else
        {
            $event->project->policies()->saveMany([
                new ProjectPolicy(['policy_type' => 'invitation', 'policy' => $projectPolicies['invitation']]),
                new ProjectPolicy(['policy_type' => 'approval',   'policy' => $projectPolicies['approval']]),
                new ProjectPolicy(['policy_type' => 'visibility', 'policy' => $projectPolicies['visibility']])
            ]);
        }
    }
}
