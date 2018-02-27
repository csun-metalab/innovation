<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Helix\Models\Purpose;
use Helix\Models\Attribute;
use Helix\Models\Project;

class AttributesTest extends TestCase
{
    use DatabaseTransactions;


    public function testPurposeRelation()
    {
	$fakeProject = factory(Project::class)->create();
	$fakePurpose = factory(Purpose::class)->create([
		   'system_name'=>'This is a unique primary key'
	    ]);
	$fakeAttribute = factory(Attribute::class)->create([
		'project_id'   =>$fakeProject->project_id,
		'purpose_name' =>$fakePurpose->system_name
	]);

        $results = Attribute::with('purpose')->get();
        foreach ($results as $attributes) {
            //Assert that it exists.
            $this->assertTrue(isset($attributes->purpose_name));
            $this->assertTrue(isset($attributes->purpose->display_name));
        }
    }

    public function testRelatingToProject()
    {
        $fakeProject = factory(Project::class)->create();
        $fakeAttribute = factory(Attribute::class)->create(['project_id'=>$fakeProject->project_id]);

        $result= Attribute::with('project')->findOrFail($fakeAttribute->project_id);

        $this->assertTrue(isset($result->project->project_id));
    }

    public function testRelatingFromProject()
    {
        $fakeProject = factory(Project::class)->create();
        $fakeAttribute = factory(Attribute::class)->create(['project_id'=>$fakeProject->project_id]);

        $results = Project::with('attributes')->where('project_id', $fakeProject->project_id)->get();
        foreach ($results as $project)
        {
            $this->assertTrue(isset($project->attributes->is_featured));
        }
    }

}
