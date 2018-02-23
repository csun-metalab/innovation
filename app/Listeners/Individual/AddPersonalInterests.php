<?php

namespace Helix\Listeners\Individual;

use Helix\Events\Individual\IndividualAddPersonalInterests;
use Helix\Models\PersonalInterest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Helix\Models\Personal;
use Helix\Models\Person;

/**
 * Class AddPersonalInterests
 *
 * This is the listener that will create a personal interest
 *
 * @package Helix\Listeners\Individual
 */
class AddPersonalInterests
{
    public function handle(IndividualAddPersonalInterests $event)
    {

        // If user has included expertise - update fresco.expertise_entity
        if($event->interests)
        {
            $individualInterests = [];


            foreach($event->interests as $interest)
            {
                $individualInterest = $interest;
                if(!str_contains($interest, 'personal:'))
                {
                    $newInterest = Personal::create([
                        'attribute_id'        => generateNewPersonalId(),
                        'title'               => $interest,
                    ]);
                    $individualInterest = $newInterest->attribute_id;
                }
                $personalInterest = Personal::find($individualInterest);
                updateCount($personalInterest);

                array_push($individualInterests, $personalInterest->attribute_id);
            }
            $event->person->personal_interests()->syncWithoutDetaching($individualInterests);
        }
    }
}
