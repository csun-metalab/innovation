<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;
use Helix\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Helix\Models\FrescoExpertiseEntity;
use Helix\Models\Project;
use Helix\Events\Project\ProjectCreatedOrUpdated;

class ProjectControllerTest extends TestCase
{
    /**
     * @test
     */
    public function postProjectCreation_fires_off_an_event()
    {
        Event::fake();

        $controller = new ProjectController();

        $request = new Request([
            'title' => 'This is a title',
            'project_type' => 'this is a type',
            'project_purpose' => 'this is a purpose',
            'description' => 'Here is where i describe something',
            'start_date' => 'a start date',
            'end_date' => 'a end date',
            'url' => 'a url',
            'youtube' => 'a youtube link',
            'tags' => ['some','tags'],
            'collaborators' => ['person', 'SunRa', 'MadLib'],
            'seekingCollaborators' => 12,
            'seekingStudents' => 11,
            'studentQualifications' => ['things', 'andMoreThings']
        ]);

        $controller->postProjectCreation($request);

        Event::assertDispatched(ProjectCreatedOrUpdated::class);
    }
}