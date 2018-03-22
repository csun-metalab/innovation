<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface UpdateProjectGeneralContract
{
    public function updateProjectGeneral($projectId, array $data);
}
