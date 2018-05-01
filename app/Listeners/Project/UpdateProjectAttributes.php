<?php

declare(strict_types=1);

namespace Helix\Listeners\Project;

use Helix\Events\Project\ProjectCreatedOrUpdated;
use Helix\Models\Purpose;

class UpdateProjectAttributes
{
    /**
     * since we can't save to exploration we save to purpose to its own table and for clarity create its own handler for event
     * this takes the project purpose given and saves it or updates it if already exists.
     *
     * @param \Helix\Events\Project\ProjectCreatedOrUpdated $event The event
     */
    public function handle(ProjectCreatedOrUpdated $event)
    {
        $newProjectPurpose = $event->session['project_general']['project_purpose'];
        $newSeekingStudents = $event->session['seeking']['students'];
        $newStudentQualifications = $event->session['seeking']['qualifications'];
        $newSeekingCollaborators = $event->session['seeking']['collaborators'];
        $youtubeLink = $event->session['project_general']['youtube'];
        $project_id = $event->project->project_id;

        $event->project->attribute()->updateOrCreate(
            //Primary key
            [
                'project_id' => $project_id,
            ],
            // Attribute column values
            [
                'purpose_name' => $newProjectPurpose,
                'seeking_students' => $newSeekingStudents,
                'seeking_collaborators' => $newSeekingCollaborators,
                'student_qualifications' => $newStudentQualifications,
            ]
        );

        $event->project->link()->updateOrCreate(
            ['entity_id' => $project_id],
            [
                'link_type' => 'youtube',
                'link' => $youtubeLink,
            ]
        );
    }
}
