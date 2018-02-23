<?php

namespace Helix\Listeners\Project;

use Helix\Models\Purpose;
use Helix\Events\Project\ProjectCreatedOrUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProjectPurpose
{
    /**
     * since we can't save to exploration we save to purpose to its own table and for clarity create its own handler for event
     * this takes the project purpose given and saves it or updates it if already exists
     * 
     * @param      \Helix\Events\Project\ProjectCreatedOrUpdated  $event  The event
     */
    public function handle(ProjectCreatedOrUpdated $event)
    {        
        $newProjectPurpose = $event->session['project_general']['project_purpose'];
        $project_id =  $event->project->project_id;
        // Project already has purposes so update them
        $event->project->attributes()->updateOrCreate( 
            $attributes = [
                'project_id' => $project_id, 
            ],
            
            $values = [
                'purpose_name' => $newProjectPurpose
            ]

        ); 
    }
}
