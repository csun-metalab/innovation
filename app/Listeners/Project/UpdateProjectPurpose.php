<?php

declare(strict_types=1);

namespace Helix\Listeners\Project;

use Helix\Events\Project\ProjectCreatedOrUpdated;
use Helix\Models\Purpose;

class UpdateProjectPurpose
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
        $project_id = $event->project->project_id;
        // Project already has purposes so update them
        $event->project->attribute()->updateOrCreate(
            $attributes = [
                'project_id' => $project_id,
            ],

            $values = [
                'purpose_name' => $newProjectPurpose,
            ]
        );
    }
}
