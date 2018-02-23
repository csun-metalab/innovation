<?php

namespace Helix\Events\Individual;

use Helix\Models\Person;
use Helix\Events\Event;
use Illuminate\Queue\SerializesModels;

class IndividualAddAcademicInterests extends Event
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
