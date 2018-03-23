<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface UpdateProjectPurposeContract
{
    public function updateProjectPurpose($projectId, array $data);
}
