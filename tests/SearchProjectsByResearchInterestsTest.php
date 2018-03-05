_<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Helix\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Helix\Models\FrescoExpertiseEntity;
use Helix\Models\Project;
use Helix\Models\Research;

class SearchProjectsByResearchInterestsTest extends TestCase
{
  use DatabaseTransactions;


  /**
   * Helper functino for testing Project::withInterestsLike($str).
   * Searches for Projects by research interest.
   * @param string $searchStr - The research interest by which we are searching for people.
   * @return Project Collection - A laravel collection of instances of the ProjectMeta model
   *  who have the requested research interest.
   */
  private function searchProjectsByResearchInterest($searchStr) {
    $searchStr = trim($searchStr);
    if (!$searchStr) {
      return collectEloquent([]);
    }
    return Project::withInterestsLike($searchStr)->get();
  }

  private function createFakeProjects ($count)
  {
    $projects = [];
    for ($i=0; $i < $count; $i++) {
      $project = factory(Project::class)->create([
        'project_title' => "Test Project ${i}"
      ]);
      $projects[] = $project;
    }
    return collectEloquent($projects);
  }

  /**
   * Helper function to give many Projects an expertise.
   * @param Research $expertise - The expertise to attach
   * @param Project Collection $projects - The laravel collection of projects.
   * @return void
   */
  private function attachExpertiseToManyProjects($expertise, $projects)
  {
    $preparedInsertion = [];
    foreach($projects->modelKeys() as $projectId)
    {
      $preparedInsertion[] = [
        //Column => value
        'expertise_id' => $expertise->attribute_id,
        'entities_id'  => $projectId
      ];
    }
    if(!empty($preparedInsertion))
    {
      DB::table('fresco.expertise_entity')
        ->insert($preparedInsertion);
    }
  }

  /**
   * Tests if we can search for projects who have a given interest.
   */
  public function testSearchingForProjectsByResearchInterest()
  {
    $controller = $this;
    $searchTerms = "Test Research Interest";

    // Create a fake expertise instance.
    $expertise = factory(Research::class)->create(['title'=>$searchTerms]);
    //Make sure the fake Research made it to the DB
    $this->assertDatabaseHas('fresco.research_interests', ['attribute_id' => $expertise->attribute_id]);

    // Attach the expertise with some projects for testing.
    $testProjects = $this->createFakeProjects(10);
    $this->attachExpertiseToManyProjects($expertise, $testProjects);

    // Run the controller
    $projects = $controller->searchProjectsByResearchInterest($searchTerms)->modelKeys();

    //Check the result.
    $expectedInOutput = $testProjects->modelKeys();
    foreach($expectedInOutput as $project)
    {
//      echo "Checking if ${project} is in the output...\n";
      $this->assertContains($project,$projects);
    }

  }
  /**
   * Tests an Interest that exists but no project has.
   */
  public function testSearchProjectsByExistantInterestYieldingNoResults()
  {
    $controller = $this;
    // Create a Research Interest.
    $searchTerms = "Test Research Interest";
    $expertise = factory(Research::class)->create(['title'=>$searchTerms]);
    $this->assertDatabaseHas('fresco.research_interests', ['title' => $searchTerms]);

    //Get some projects, but don't give them this expertise.
    $testProjects = $this->createFakeProjects(10);

    //Run the controller method
    $projects= $controller->searchProjectsByResearchInterest($searchTerms)->modelKeys();

    //Check the results
    foreach ($testProjects as $project) {
//      echo "Checking if " . $project->project_id . " is NOT in the output...\n";
      $this->assertFalse(in_array($project->project_id, $projects));
    }
    $this->assertTrue(empty($projects));
  }

  /**
   * Tests an Interest that DOES NOT exist but no project has.
   */
  public function testSearchProjectsByNonExistantInterest()
  {
    $controller = $this;
    $searchTerms = "TestableResearchInterestThatShouldDefinitelyNotExistInThisSearchAlphaBetaGammaDeltaEpsilonZetaEtaThetaIotaKappaLambdaMuNuXiOmicronPiRhoSigmaTauUpsilonPhiChiPsiOmega";

    //Don't  put this research interest into the database

    $this->assertDatabaseMissing('fresco.research_interests', ['title' => $searchTerms]);

    //Get some projects. They should not have this research interest because it doesn't exist.
    $testProjects = $this->createFakeProjects(10);

    //Run the controller method.
    $projects= $controller->searchProjectsByResearchInterest($searchTerms)->modelKeys();

    //Check the results
    foreach ($testProjects as $project) {
//      echo "Checking if " . $project->project_id . " is NOT in the output...\n";
      $this->assertFalse(in_array($project->project_id, $projects));
    }
    $this->assertTrue(empty($projects));
  }

  // Test the case where the request string is empty.
  public function testSearchingProjectsWithEmptySearch()
  {
    $controller = $this;
    $projects = $controller->searchProjectsByResearchInterest("")->modelKeys();
    $this->assertTrue(empty($projects));
  }

  // Test the case where the request string is empty.
  public function testSearchingProjectsWithWhitespaceSearch()
  {
    $controller = $this;
    $projects = $controller->searchProjectsByResearchInterest("          ")->modelKeys();
    $this->assertTrue(empty($projects));
  }

  //We want results to match at least 1 of the search terms if the expertise starts with it.
  //For example: if you search "Lambda CHI Alpha fraternity", you should get projects with "Lambda Calculus"
  public function testSearchRelavenceIfTheExpertiseStartsWithSearchTerm()
  {
    $this->markTestIncomplete('Non-Functional Test');
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"lambda calculus"]);

    //Get some projects.
    $testProjects = $this->createFakeProjects(3);

    //Give them the expertise "lambda calculus"
    $this->attachExpertiseToManyProjects($expertise, $testProjects);

    //Run the controller method.
    $projects = $controller->searchProjectsByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testProjects = $testProjects->modelKeys();
    foreach($testProjects as $expectedResult)
    {
      $this->assertTrue(in_array($expectedResult, $projects));
    }
  }

  //We want results to match at least 1 of the search terms if the expertise ends with it.
  //For example: if you search "Lambda CHI Alpha fraternity", you should get projects with "Meditative CHI"
  public function testSearchRelavenceIfTheExpertiseEndsWithSearchTerm()
  {
    $this->markTestIncomplete('Non-Functional Test');
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"meditative chi"]);

    //Get some projects.
    $testProjects = $this->createFakeProjects(3);

    //Give them the expertise
    $this->attachExpertiseToManyProjects($expertise, $testProjects);

    //Run the controller method.
    $projects = $controller->searchProjectsByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testProjects = $testProjects->modelKeys();
    foreach($testProjects as $expectedResult)
    {
      $this->assertTrue(in_array($expectedResult, $projects));
    }
  }

  //We want results to match at least 1 of the search terms if the expertise contains one those words.
  //For example: if you search "Lambda CHI Alpha fraternity", you should get projects with "International fraternity council"
  public function testSearchRelavenceIfTheExpertiseContainsearchTerm()
  {
    $this->markTestIncomplete('Non-Functional Test');
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"International fraternity council"]);

    //Get some projects.
    $testProjects = $this->createFakeProjects(3);

    //Give them the expertise
    $this->attachExpertiseToManyProjects($expertise, $testProjects);

    //Run the controller method.
    $projects = $controller->searchProjectsByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testProjects = $testProjects->modelKeys();
    foreach($testProjects as $expectedResult)
    {
//      echo "Checking if result contains ${expectedResult}\n";
      $this->assertTrue(in_array($expectedResult, $projects));
    }
  }
  //We want results to match at least 1 of the search terms, but not partial words
  //For example: if you search "Lambda CHI Alpha fraternity", you should NOT get projects with "arCHItecture"
  public function testSearchIrrelevanceForPartialWords()
  {
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"Architecture"]);

    //Get some projects.
    $testProjects = $this->createFakeProjects(3);

    //Give them the expertise
    $this->attachExpertiseToManyProjects($expertise, $testProjects);

    //Run the controller method.
    $projects = $controller->searchProjectsByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testProjects = $testProjects->modelKeys();
    foreach($testProjects as $expectedResult)
    {
      $this->assertFalse(in_array($expectedResult, $projects));
    }
  }
}
