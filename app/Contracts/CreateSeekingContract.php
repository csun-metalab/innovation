<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface CreateSeekingContract
{
    public function createSeeking($projectId, $title);
}
