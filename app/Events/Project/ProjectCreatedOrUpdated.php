<?php

declare(strict_types=1);

namespace Helix\Events\Project;

use Helix\Events\Event;
use Helix\Models\Project;
use Illuminate\Queue\SerializesModels;

class ProjectCreatedOrUpdated extends Event
{
    public $projectId;
    public $data;

    use SerializesModels;

    public function __construct($projectId, array $data)
    {
        $this->projectId = $projectId;
        if (null === $this->projectId) {
            $this->projectId = generateNewProjectId();

            Project::create([
                'project_id' => $this->projectId,
            ]);
        }

        $this->data = $data;
    }
}
