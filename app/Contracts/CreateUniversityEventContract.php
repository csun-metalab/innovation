<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface CreateUniversityEventContract
{
    public function createUniversityEvent($eventName,$startDate,$endDate,$originator);
}
