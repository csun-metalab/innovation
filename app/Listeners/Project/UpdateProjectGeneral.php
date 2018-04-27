<?php

declare(strict_types=1);

namespace Helix\Listeners\Project;

use Helix\Events\Project\ProjectCreatedOrUpdated;
use Helix\Models\Project;

class UpdateProjectGeneral
{
    // If user has changed project information from cayuse - update exploration.projects
    public function handle(ProjectCreatedOrUpdated $event)
    {
        $project = Project::findOrFail($event->projectId);

        $project->slug = slugify($event->data['project_general']['title']);
        $project->project_title = $event->data['project_general']['title'];
        $project->project_url = $event->data['project_general']['url'] ?: null;
        $project->project_begin_date = timestampFormat($event->data['project_general']['start_date']);
        $project->project_end_date = $event->data['project_general']['end_date'] ? timestampFormat($event->data['project_general']['end_date']) : null;
        $project->abstract = $event->data['project_general']['description'];
        $project->is_publishable = 1;
        $project->save();
    }
}
