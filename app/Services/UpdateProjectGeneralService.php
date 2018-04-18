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
        if($project->project_title != $data['title']){
            $project->slug = slugify($data['title']);
            $project->project_title = $data['title'];
        }
        $project->visibility = 1;
        $project->pi_members_id = $data['project_author'];
        //$project->project_begin_date = timestampFormat($data['project_general']['start_date']);
        //$project->project_end_date = $data['project_general']['end_date'] ? timestampFormat($data['project_general']['end_date']) : null;
        $project->abstract = $data['description'];
        $project->is_publishable = 1;
        $project->save();
        $project->searchable();
        if(isset($data['video'])){
            Link::create([
                'entity_id' => $projectId,
                'link_type' => 'video',
                'link'  =>  $data['video']
            ]);
        }
        if(isset($data['url'])){
            Link::create([
                'entity_id' => $projectId,
                'link_type' => 'url',
                'link'  =>  $data['url']
            ]);
        }
    }
}
