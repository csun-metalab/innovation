<?php

declare(strict_types=1);

namespace tests\ListenerTests;

use Helix\Events\Project\ProjectCreatedOrUpdated;
use Helix\Listeners\Project\UpdateProjectGeneral;
use Helix\Models\Project;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UpdateProjectGeneralTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        $this->markTestIncomplete('Databases are too dirty to try and test database changes');

        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function UpdateProjectGeneral_listens_for_ProjectCreatedOrUpdated_and_reacts_appropriatly()
    {
        $listener = new UpdateProjectGeneral();
        $data = [
            'project_general' => [
                'title' => 'This is a title',
                'project_type' => 'this is a type',
                'project_purpose' => 'this is a purpose',
                'description' => 'Here is where i describe something',
                'start_date' => 'a start date',
                'end_date' => 'a end date',
                'url' => 'a url',
                'youtube' => 'a youtube link',
            ],
            'tags' => ['some', 'tags'],
            'collaborators' => ['person', 'SunRa', 'MadLib'],
            'seekingCollaborators' => 12,
            'seekingStudents' => 11,
            'studentQualifications' => ['things', 'andMoreThings'],
        ];
        $project = factory(Project::class)->create();
        $listener->handle(new ProjectCreatedOrUpdated($project->project_id, $data));
    }
}
