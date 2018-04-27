<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\VerifyProjectIdContract;
use Helix\Models\Project;

class VerifyProjectIdService implements VerifyProjectIdContract
{
    public function verifyId($projectId)
    {
        if ($projectId == null) {
            $projectId = generateNewProjectId();

            Project::create([
                'project_id' => $projectId,
            ]);

            return $projectId;
        }

        return $projectId;
    }
}
