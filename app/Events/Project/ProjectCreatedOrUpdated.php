<?php

declare(strict_types=1);

namespace Helix\Events\Project;

use Helix\Events\Event;
use Helix\Models\Project;
use Illuminate\Queue\SerializesModels;

class ProjectCreatedOrUpdated extends Event
{
    public $project;
    public $session;

    use SerializesModels;

    public function __construct($projectId, array $data)
    {
        if (null === $projectId) {
            $projectId = generateNewProjectId();

            Project::create([
                'project_id' => $projectId,
            ]);
        }
    }
}
