<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface UpdateProjectAttributesContract
{
    public function updateProjectAttributes($projectId, array $data);
}
