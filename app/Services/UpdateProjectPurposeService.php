<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\UpdateProjectPurposeContract;
use Helix\Models\Project;

class UpdateProjectPurposeService implements UpdateProjectPurposeContract
{
    public function updateProjectPurpose($projectId, array $data)
    {
        $project = Project::findOrFail($projectId);

        $newProjectPurpose = $data['project_general']['project_purpose'];
        $project_id = $project->project_id;
        // Project already has purposes so update them
        $project->attribute()->updateOrCreate(
            $attributes = [
                'project_id' => $project_id,
            ],

            $values = [
                'purpose_name' => $newProjectPurpose,
            ]
        );
    }
}
