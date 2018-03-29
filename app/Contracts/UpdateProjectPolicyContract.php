<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface UpdateProjectPolicyContract
{
    public function updateProjectPolicy($projectId, array $data);
}
