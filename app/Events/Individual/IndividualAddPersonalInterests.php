<?php

namespace Helix\Events\Individual;

use Helix\Models\Person;
use Helix\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class IndividualAddPersonalInterests
 *
 * This will fire the even to add a personal interest
 *
 * @package Helix\Events\Individual
 */
class IndividualAddPersonalInterests extends Event
{
    public $interests;
    public $person;

    use SerializesModels;

    public function __construct(Person $person, array $interests)
    {
        $this->person = $person;
        $this->interests = $interests;
    }
}
