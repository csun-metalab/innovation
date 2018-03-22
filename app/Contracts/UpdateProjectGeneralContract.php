<?php

declare(strict_types=1);

namespace app\Contracts;

interface UpdateProjectGeneralContract
{
    public function updateProjectGeneral($projectId, array $data);
}
