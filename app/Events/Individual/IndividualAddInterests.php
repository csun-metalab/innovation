<?php

declare(strict_types=1);

namespace Helix\Events\Individual;

use Helix\Events\Event;
use Helix\Models\Person;
use Illuminate\Queue\SerializesModels;

class IndividualAddInterests extends Event
{
    public $person;

    use SerializesModels;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }
}
