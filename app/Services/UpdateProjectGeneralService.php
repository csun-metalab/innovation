<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\UpdateProjectGeneralContract;
use Helix\Models\Project;

class UpdateProjectGeneralService implements UpdateProjectGeneralContract
{
    public function updateProjectGeneral($projectId, array $data)
    {
        $project = Project::findOrFail($projectId);

        $project->slug = slugify($data['project_general']['title']);
        $project->project_title = $data['project_general']['title'];
        $project->project_url = $data['project_general']['url'] ?: null;
        $project->project_begin_date = timestampFormat($data['project_general']['start_date']);
        $project->project_end_date = $data['project_general']['end_date'] ? timestampFormat($data['project_general']['end_date']) : null;
        $project->abstract = $data['project_general']['description'];
        $project->is_publishable = 1;
        $project->save();
    }
}
