<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\UpdateProjectAttributesContract;
use Helix\Models\Project;

class UpdateProjectAttributesService implements UpdateProjectAttributesContract
{
    public function updateProjectAttributes($projectId, array $data)
    {
        $project = Project::findOrFail($projectId);

        // $newProjectPurpose = $data['project_general']['project_purpose'];
        // $newSeekingStudents = $data['seeking']['students'];
        // $newStudentQualifications = $data['seeking']['qualifications'];
        // $newSeekingCollaborators = $data['seeking']['collaborators'];
        $project_id = $project->project_id;

        $project->attribute()->updateOrCreate(
        //Primary key
            [
                'project_id' => $project_id,
            ],
            // Attribute column values
            [
                'purpose_name' => 'innovation',
                'seeking_students' => 0,
                'seeking_collaborators' => 0,
            ]
        );
    }
}
