<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Helix\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Helix\Models\FrescoExpertiseEntity;
use Helix\Models\Project;
use Helix\Models\Research;

class SearchControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Helper function to make fake data.
     * @return array  - returns fake data in the following format:
     *   ['project'=> $fakeProject, 'expertise'=> $fakeExpertise]
     */
    private function makeFakeData($title)
    {
      //Fake data
      $fakeExpertise = factory(Research::class)->create(['title'=>$title]);
      $fakeProject = factory(Project::class)->create(['project_title' => "Test Project"]);
      //Relate them
      DB::table('fresco.expertise_entity')
          ->insert([
              // Column      => value
              'expertise_id' => $fakeExpertise->attribute_id,
              'entities_id'  => $fakeProject->project_id
          ]);

      return [
        'project'   => $fakeProject,
        'expertise' => $fakeExpertise
      ];
    }


    /**
     * Testing Search By Research Interest Api
     * We should expect people and projets to be returned.
     *
     * @return void
     */
    public function testIfResponseJsonForSearchByExpertiseApiContainsPeopleAndProjects()
    {
        $this->markTestIncomplete('Non-Functional Test');
        $controller = new SearchController();
        //Make fake data.
        $fakeData = $this->makeFakeData('rocket surgery');

        // Prepare the inputs.
        $request = new Request([
          'query' => 'surgery'
        ]);

        //Run the controller method.
        $response = $controller->searchByResearchInterestApi($request);

        $this->assertEquals(200, $response['status']);

        $this->assertTrue(isset($response['results']['people']), "We were not given back a 'people' variable.");
        $this->assertTrue(isset($response['results']['projects']), "We were not given back a 'projects' variable.");

        $this->assertThat(
          json_encode($response['results']),
          $this->stringContains('rocket surgery')
        );

    }

  /**
   * Testing Search By Research Interest Api
   * If we request request to take only a given amount of data
   * We should expect 4 or less results.
   * @return void
   */
  public function testIfResultsForSearchByExpertiseApiContainingPeopleAndProjectsOnlyHaveTheGivenAmount()
  {
      $this->markTestIncomplete('Non-Functional Test');
      $controller = new SearchController();
      //Make a lot of fake data. We don't need to keep it; we just need to count the results.
      for ($i=0; $i < 10; $i++) {
        $this->makeFakeData('rocket surgery');
      }

      // Prepare the inputs.
      $request = new Request([
        'query'  => 'surgery'
      ]);

      //Run the controller method.
      $response = $controller->searchByResearchInterestApi($request,4);
      $content = $response['results'];

      //We should expect a maximum of four results each.
      $this->assertLessThanOrEqual(4,count($content['people']));
      $this->assertLessThanOrEqual(4,count($content['projects']));
  }

  public function testRouteForSearchingByExpertiseApi()
  {
    $this->markTestIncomplete('Non-Functional Test');
    $this->makeFakeData('rocket surgery');

    $response = $this->call('GET', '/api/search/research-interests', ['query'=>'rocket surgery']);

    $content = json_encode($response->original['results']);


    $this->assertEquals(200, $response->original['status']);

    $this->assertThat(
      $response->getContent(),
      $this->stringContains('people')
    );

    $this->assertThat(
      $response->getContent(),
      $this->stringContains('projects')
    );

    $this->assertThat(
      $response->getContent(),
      $this->stringContains('rocket surgery')
    );
  }


  public function testRouteforSearchingByResearchInterest(){
    $response = $this->call('GET', 'search/research-interests', ['query'=>'space']);

    $this->assertViewHasAll(['people','projects']);

  }

}
