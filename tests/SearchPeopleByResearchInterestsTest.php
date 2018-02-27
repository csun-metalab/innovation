_<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Helix\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Helix\Models\FrescoExpertiseEntity;
use Helix\Models\Person;
use Helix\Models\Research;

class SearchPeopleByResearchInterestsTest extends TestCase
{
  use DatabaseTransactions;

  /**
   * Helper funtion for testing Person::withInterestsLike($str) method.
   * Searches for people by research interest.
   * @param string $searchStr - The research interest by which we are searching for people.
   * @return Person Collection - A laravel collection of instances of the Person model
   *  who have the requested research interest.
   */
  private function searchPeopleByResearchInterest($searchStr) {
    $searchStr = trim($searchStr);
    if (!$searchStr) {
      //Return an empty collection.
      return collectEloquent([]);
    }
    $people = Person::withInterestsLike($searchStr,'research_interests')->get();
    //dd($people);
    return $people;
  }

  /**
   * Helper function that selects some users, removes their expertises
   * @param integer $count - A count of how many users you would like to test with.
   * @return Person Collection - A laravel collection of these users.
   */
  private function grabUsers($count)
  {
    // Grab sone users.
    $testUsers = Person::with('research_interests')->take($count)->get();
    if(!$testUsers->isEmpty())
    {
      // Remove their expertieses.
      DB::table('fresco.expertise_entity')
        ->whereIn('entities_id', $testUsers->modelKeys())
        ->delete();
    }
    return $testUsers;
  }

  /**
   * Helper function to give many users an expertise.
   * @param Research $expertise - The expertise to attach
   * @param Person Collection $users - The laravel collection of users.
   * @return void
   */
  private function attachExpertiseToManyUsers($expertise, $users)
  {
    $preparedInsertion = [];
    foreach($users->modelKeys() as $userId)
    {
      $preparedInsertion[] = [
        //Column => value
        'expertise_id' => $expertise->attribute_id,
        'entities_id'  => $userId
      ];
    }
    if(!empty($preparedInsertion))
    {
      DB::table('fresco.expertise_entity')
        ->insert($preparedInsertion);
    }
  }

  /**
   * Tests if we can search for people who have a given interest.
   */
  public function testSearchingForPeopleByResearchInterest()
  {
    $controller = $this;
    $searchTerms = "Test Research Interest";

    // Create a fake expertise instance.
    $expertise = factory(Research::class)->create(['title'=>$searchTerms]);
    //Make sure the fake Research made it to the DB
    $this->seeInDatabase('fresco.research_interests', ['attribute_id' => $expertise->attribute_id]);

    // Attach the expertise with some users for testing.
    $testUsers = $this->grabUsers(10);
    $this->attachExpertiseToManyUsers($expertise, $testUsers);
    //$this->seeInDatabase('fresco.expertise_entity', ['expertise_id' => $expertise->attribute_id, 'entities_id'=> "members:102531362"]);
    // Run the controller
    $people = $controller->searchPeopleByResearchInterest($searchTerms)->modelKeys();

    //Check the result.
    $expectedInOutput = $testUsers->modelKeys();
    foreach($expectedInOutput as $member)
    {
//      echo "Checking if ${member} is in the output...\n";
      $this->assertContains($member,$people);
    }

  }
  /**
   * Tests an Interest that exists but nobody has.
   */
  public function testSearchFacultyByExistantInterestYieldingNoResults()
  {
    $controller = $this;
    // Create a Research Interest.
    $searchTerms = "Test Research Interest";
    $expertise = factory(Research::class)->create(['title'=>$searchTerms]);
    $this->seeInDatabase('fresco.research_interests', ['title' => $searchTerms]);

    //Get some users, but don't give them this expertise.
    $testUsers = $this->grabUsers(10);

    //Run the controller method
    $people= $controller->searchPeopleByResearchInterest($searchTerms)->modelKeys();

    //Check the results
    foreach ($testUsers as $user) {
//      echo "Checking if " . $user->user_id . " is NOT in the output...\n";
      $this->assertFalse(in_array($user->user_id, $people));
    }
    $this->assertTrue(empty($people));
  }

  /**
   * Tests an Interest that DOES NOT exist but nobody has.
   */
  public function testSearchFacultyByNonExistantInterest()
  {
    $controller = $this;
    $searchTerms = "Testable_Research_Interest_that_should_definitely_not_exist_in_this_search_alpha_beta_gamma_delta_epsilon_zeta_eta_theta_iota_kappa_lambda_mu_nu_xi_omicron_pi_rho_sigma_tau_upsilon_phi_chi_psi_omega.";

    //Do not put create this research interest in the database.

    $this->notSeeInDatabase('fresco.research_interests', ['title' => $searchTerms]);

    //Get some users. They should not have this research interest because it doesn't exist.
    $testUsers = $this->grabUsers(10);

    //Run the controller method.
    $people= $controller->searchPeopleByResearchInterest($searchTerms)->modelKeys();

    //Check the results
    foreach ($testUsers as $user) {
//      echo "Checking if " . $user->user_id . " is NOT in the output...\n";
      $this->assertFalse(in_array($user->user_id, $people));
    }

    $this->assertTrue(empty($people));
  }

  // Test the case where the request string is empty.
  public function testSearchingPeopleWithEmptySearch()
  {
    $controller = $this;
    $people = $controller->searchPeopleByResearchInterest("")->modelKeys();
    $this->assertTrue(empty($people));
  }

  //We want results to match at least 1 of the search terms if the expertise starts with it.
  //For example: if you search "Lambda CHI Alpha fraternity", you should get people with "Lambda Calculus"
  public function testSearchRelavenceIfTheExpertiseStartsWithSearchTerm()
  {
    $this->markTestIncomplete('Non-Functional Test');
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"lambda calculus"]);

    //Get some users.
    $testUsers = $this->grabUsers(3);

    //Give them the expertise "lambda calculus"
    $this->attachExpertiseToManyUsers($expertise, $testUsers);

    //Run the controller method.
    $people = $controller->searchPeopleByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testUsers = $testUsers->modelKeys();

    foreach($testUsers as $expectedResult)
    {
      $this->assertTrue(in_array($expectedResult, $people));
    }
  }

  //We want results to match at least 1 of the search terms if the expertise ends with it.
  //For example: if you search "Lambda CHI Alpha fraternity", you should get people with "Meditative CHI"
  public function testSearchRelavenceIfTheExpertiseEndsWithSearchTerm()
  {
    $this->markTestIncomplete('Non-Functional Test');
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"meditative chi"]);

    //Get some users.
    $testUsers = $this->grabUsers(3);

    //Give them the expertise
    $this->attachExpertiseToManyUsers($expertise, $testUsers);

    //Run the controller method.
    $people = $controller->searchPeopleByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testUsers = $testUsers->modelKeys();
    foreach($testUsers as $expectedResult)
    {
      $this->assertTrue(in_array($expectedResult, $people));
    }
  }

  //We want results to match at least 1 of the search terms if the expertise contains one those words.
  //For example: if you search "Lambda CHI Alpha fraternity", you should get people with "International fraternity council"
  public function testSearchRelavenceIfTheExpertiseContainsearchTerm()
  {
    $this->markTestIncomplete('Non-Functional Test');
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"International fraternity council"]);

    //Get some users.
    $testUsers = $this->grabUsers(3);

    //Give them the expertise
    $this->attachExpertiseToManyUsers($expertise, $testUsers);

    //Run the controller method.
    $people = $controller->searchPeopleByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testUsers = $testUsers->modelKeys();
    foreach($testUsers as $expectedResult)
    {
//      echo "Checking if result contains ${expectedResult}\n";
      $this->assertTrue(in_array($expectedResult, $people));
    }
  }
  //We want results to match at least 1 of the search terms, but not partial words
  //For example: if you search "Lambda CHI Alpha fraternity", you should NOT get people with "arCHItecture"
  public function testSearchIrrelevanceForPartialWords()
  {
    $controller = $this;
    $searchTerms ="lambda chi alpha fraternity";

    //Make an expertise
    $expertise = factory(Research::class)->create(['title'=>"Architecture"]);

    //Get some users.
    $testUsers = $this->grabUsers(3);

    //Give them the expertise
    $this->attachExpertiseToManyUsers($expertise, $testUsers);

    //Run the controller method.
    $people = $controller->searchPeopleByResearchInterest($searchTerms)->modelKeys();

    //check results.
    $testUsers = $testUsers->modelKeys();
    foreach($testUsers as $expectedResult)
    {
      $this->assertFalse(in_array($expectedResult, $people));
    }
  }
}
