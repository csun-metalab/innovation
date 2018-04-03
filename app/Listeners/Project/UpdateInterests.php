<?php

namespace Helix\Listeners\Project;

use Helix\Events\Project\ProjectCreatedOrUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateInterests
{
    public function handle(ProjectCreatedOrUpdated $event)
    {
        // If user has included expertise - update fresco.expertise_entity
        if(array_key_exists('interests', $event->session))
        {
            // Lazy load the interests to a project to iterate and decrement
            $event->project->load('interests');

            // To keep count, we're going to just drop the values of all previous interests and update them in the end.
            foreach ($event->project->interests as $interest) {
                $interest->decrement('count');
            }

        	$projectInterests = [];
            
            foreach($event->session['interests']['tags'] as $interest)
            {
                
                $result = explode('--', $interest);
                $projectInterest = $result[0];

                if(!str_contains($result[0], 'research:'))
                {
                    $newInterest = Research::create([
                        'attribute_id'        => generateNewResearchId(),
                        'title'               => $result[0],
                        'parent_attribute_id' => $result[1],
                        'hierarchy'           => $result[2]
                    ]);
                    $projectInterest = $newInterest->attribute_id;
                } 

                $researchInterest = Research::find($projectInterest);
                updateCount($researchInterest);

                array_push($projectInterests, $projectInterest);
            }

            $event->project->interests()->sync($projectInterests);
        }
        // No interests were included in the session
        else
        {
            // Does the project have any interests?
            if(count($event->project->interests))
            {
                // The user is probably trying to delete pre-existing interests
                $event->project->interests()->delete();
            }
        }

    }
}
