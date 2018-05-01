<?php

namespace Helix\Listeners\Individual;

use Helix\Events\Individual\IndividualAddInterests;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Helix\Models\Person;

class AddInterests
{
    public function handle(IndividualAddInterests $event)
    {
        // If user has included expertise - update fresco.expertise_entity
        if($event->interests)
        {
            $individualInterests = [];

            foreach($event->interests as $interest)
            {
                $result = explode('--', $interest);
                $individualInterest = $result[0];

                if(!str_contains($result[0], 'research:'))
                {
                    $newInterest = Research::create([
                        'attribute_id'        => generateNewResearchId(),
                        'title'               => $result[0],
                        'parent_attribute_id' => $result[1],
                        'hierarchy'           => $result[2]
                    ]);

                    $individualInterest = $newInterest->attribute_id;
                } 

                $researchInterest = Research::find($individualInterest);
                updateCount($researchInterest);

                array_push($individualInterests, $individualInterest);
            }

            $event->person->all_interests()->syncWithoutDetaching($individualInterests);
        }
    }
}
