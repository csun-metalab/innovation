<?php

namespace Helix\Events\Project;

use Helix\Models\Project;
use Helix\Events\Event;
use Illuminate\Queue\SerializesModels;

class ProjectCreatedOrUpdated extends Event
{
    public $project;
    public $session;

    use SerializesModels;

    public function __construct(Project $project, array $session)
    {
        $this->project = $project;
        $this->session = $session;
    }
}
