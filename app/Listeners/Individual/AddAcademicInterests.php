<?php

namespace Helix\Listeners\Individual;

use Helix\Events\Individual\IndividualAddAcademicInterests;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Helix\Models\Person;

class AddAcademicInterests
{
    public function handle(IndividualAddAcademicInterests $event)
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

                /**
                 * There was once an updated count here, but we took it off because we want to keep the count for
                 * research interests. So, there is only a count update for the research interests.
                 */
                $researchInterest = Research::find($individualInterest);

                // This is the key difference because academic is still mapping to the research interests tree.
                $individualInterest .= ':academic';

                array_push($individualInterests, $individualInterest);
            }

            $event->person->all_interests()->syncWithoutDetaching($individualInterests);
        }
    }
}
