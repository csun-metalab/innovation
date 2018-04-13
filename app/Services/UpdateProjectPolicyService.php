<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\UpdateProjectPolicyContract;
use Helix\Models\Project;
use Helix\Models\ProjectPolicy;

class UpdateProjectPolicyService implements UpdateProjectPolicyContract
{
    public function updateProjectPolicy($projectId, array $data)
    {
        $project = Project::findOrFail($projectId);
        // Grab permission level for the project
        $projectPolicies = $project->getSelectedPolicies($data['project_type']);

        // Project already has policies so update them
        if (\count($project->policies) > 0) {
            ProjectPolicy::invitationPolicy($project)->update([
                'policy' => $projectPolicies['invitation'],
            ]);
            ProjectPolicy::approvalPolicy($project)->update([
                'policy' => $projectPolicies['approval'],
            ]);
            ProjectPolicy::visibilityPolicy($project)->update([
                'policy' => $projectPolicies['visibility'],
            ]);
        }
        // No project policies exist so create them
        else {
            $project->policies()->saveMany([
                new ProjectPolicy(['policy_type' => 'invitation', 'policy' => $projectPolicies['invitation']]),
                new ProjectPolicy(['policy_type' => 'approval',   'policy' => $projectPolicies['approval']]),
                new ProjectPolicy(['policy_type' => 'visibility', 'policy' => $projectPolicies['visibility']]),
            ]);
        }
    }
}
