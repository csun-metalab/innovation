<?php

declare(strict_types=1);

namespace Helix\Contracts;

interface UpdateCollaboratorsContract
{
    public function updateCollaborators($projectId, array $data);
}
