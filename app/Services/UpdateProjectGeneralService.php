<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\UpdateProjectGeneralContract;
use Helix\Models\Project;
use Helix\Models\Link;

class UpdateProjectGeneralService implements UpdateProjectGeneralContract
{
    public function updateProjectGeneral($projectId, array $data)
    {
        $project = Project::findOrFail($projectId);
        $project->slug = slugify($data['title']);
        $project->project_title = $data['title'];
        $project->visibility = 1;
        $project->pi_members_id = $data['project_author'];
        $project->abstract = $data['description'];
        $project->is_publishable = 1;
        $project->save();
        $project->searchable();
        if(isset($data['url'])){
            Link::create([
                'entity_id' => $projectId,
                'link_type' => 'video',
                'link'  =>  $data['url']
            ]);
        }
    }
}
