<?php

namespace Helix\Listeners\Project;

use Helix\Events\Project\ProjectCreatedOrUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProjectGeneral
{
    // If user has changed project information from cayuse - update exploration.projects
    public function handle(ProjectCreatedOrUpdated $event)
    {

        $event->project->slug = slugify($event->session['project_general']['title']);
        $event->project->project_title      = $event->session['project_general']['title'];
        $event->project->project_url        = $event->session['project_general']['url'] ?: NULL;
        $event->project->project_begin_date = timestampFormat($event->session['project_general']['start_date']);
        $event->project->project_end_date   = $event->session['project_general']['end_date'] ? timestampFormat($event->session['project_general']['end_date']) : NULL;
        $event->project->abstract           = $event->session['project_general']['description'];
        $event->project->is_publishable     = 1;
        $event->project->save();
    }
}
