<?php namespace Helix\Http\Controllers;

use Helix\Models\Purpose;
use Helix\Models\Project;
use Helix\Models\Award;
use Helix\Models\AcademicDepartment;
use Helix\Models\Research;
use Helix\Models\NemoMembership;
use Searchy;
use Helix\Models\Person;

/**
 * Handles the search pages, query builders for those pages, and the functions
 * the AJAX calls from the filter.
 *
 * @package Helix\Http\Controllers
 */
class SearchController extends Controller
{
    /**
     * This creates the Titles And Abstract page and also the Featured Project page.
     * If the user visits the route for this method without any request variables, then they will
     * end up on the Featured Project page.
     * Otherwise, they will be searching titles and abstracts.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $projects = null;
        $appliedFilters = [];
        $projectsPerPage = 12;
        $recentProjectsToConsider = 20;
        $recentProjectsToRandomlyShow = 6;

        $searchFormProperties = $this->getSearchFormProperties('all');

        // Query for visible projects to browse.
        $query = $this->browseProjects();
        $featuredQuery = clone $query;
        if(request()->filled('query')) {
            $query = $this->searchTitlesAndAbstracts($query);
        }

        //We only want to randomize projects and show featured projects  when we first land on this page.
        //If we start searching, then we shouldn't show them, and we shouldn't randomize.
        // When the request is empty, this condition is successfully met.
        if( !request()->all() ) {
            $projects = $query->with('attribute')
                ->whereDoesntHave('attribute', function($q) {
                    $q->where('is_featured', '=', '1' );
                })
                ->latest()
                ->take($recentProjectsToConsider)
                ->get()
                ->random($recentProjectsToRandomlyShow);
            $featuredProjects = $featuredQuery->with('attribute')->whereHas('attribute', function($q) {
                $q->where('is_featured', '1');
            })->get();
        }
        else {
            $appliedFilters = $this->applyProjectFilters($query);
            $query = $appliedFilters['filteredQuery'];
            $projects = $query->orderBy('updated_at','desc')->paginate($projectsPerPage)->setPath(url('project'));
        }
        $viewData =  compact('projects','featuredProjects');
        $viewData += $searchFormProperties;
        $viewData += $appliedFilters;
        return view('pages.project.index', $viewData);
    }

    /**
     * Use this to filter projects by sponsor, department, etc.
     * This will also create the necessary data for the View.
     * Example for getting the latest projects, filtered by Purpose (also called Type):
     *      $filterResults - $this->applyProjectFilters(Project::latest(), ['type'=>'service'];
     *      $projects = $filterResults['filteredQuery']->get();
     * @param \Illuminate\Database\Eloquent\Builder $query A query of projects
     * @param array $requestedFilters (optional)An associative array keyed by which filters you want to consider.
     *                                  Defaults to  `request()->all()`
     * @return array An array of compacted variables. All of these are for the View except $filteredQuery.
     */
    private function applyProjectFilters($query, $requestedFilters = []) {
        if (empty($requestedFilters)) {
            $requestedFilters = request()->all();
        }
        $requestedFilters = collect($requestedFilters);

        // List of things from which to search.
        $sponsor     = Award::pluck('sponsor','sponsor_code')->sort()->unique();
        $departments = AcademicDepartment::pluck('display_name','entities_id')->sort();
        $purposes    = Purpose::pluck('display_name','system_name')->sort();
        $collaborators = ['student' => 'Student Contributors', 'faculty' => 'Faculty Collaborators'];

        // Labels for the filter tags
        $filters = [];
        // Labels for the department filter drop-down box
        $departmentFilter = [];
        $filteredQuery = $query; // This  will be the narrowed-down query.
        if($requestedFilters->has('member')){
            $filteredQuery = $this->filterByMember($filteredQuery, $requestedFilters->get('member') );
            $filters['member'] = Person::select('display_name')
                ->findOrFail( $requestedFilters->get('member') )['display_name'];
        }
        if($requestedFilters->get('department')){
            // This is a change from department listing to academic interest, but we need to still get their department name
            $academicDepartment = AcademicDepartment::where('entities_id', $requestedFilters->get('department'))
                ->with('department')
                ->firstOrFail();
            $departmentName = $academicDepartment->department->first()->entities_id;
            $filteredQuery = $this->searchFilter($filteredQuery ,'department_id', $departmentName);
            $filters['department'] = $departments[$requestedFilters->get('department')];
            $departmentFilter = [
                NULL=>'Filter by Department' ,
                $requestedFilters->get('department') => $filters['department']
            ];
        }
        if($requestedFilters->get('sponsor')){
            $filteredQuery = $this->searchFilter($filteredQuery ,'sponsor_code', $requestedFilters->get('sponsor'));
            $filters['sponsor'] = $sponsor[ $requestedFilters->get('sponsor')] ;
        }
        if ($requestedFilters->get('type'))
        {
            $projectType = $requestedFilters->get('type');
            $filteredQuery = $filteredQuery->whereHas('attribute', function ($q) use($projectType){
                $this->searchFilter($q, 'purpose_name', $projectType);
            });
            $filters['type'] = $purposes[$requestedFilters->get('type')];
        }
        if ($requestedFilters->get('collaborators')) {
            $filters['collaborators'] = $collaborators[$requestedFilters->get('collaborators')];
            $collaboratorType = $requestedFilters['collaborators'];
            $filteredQuery = $filteredQuery->whereHas('attribute', function ($q) use ($collaboratorType) {
                if ($collaboratorType == "student") {
                    $this->searchFilter($q, 'seeking_students', 1);
                }
                if ($collaboratorType == "faculty") {
                    $this->searchFilter($q, 'seeking_collaborators', 1);
                }
            });
        }
        return compact(
            'filteredQuery',
            'filters',
            'departmentFilter',
            'sponsor',
            'purposes',
            'collaborators'
        );
    }

    /**
     * Maps the system name for a search type to its form-properties.
     * Creates the necessary variables for the search form.
     * @param string $defaultSearchType (optional) The search type to use when no search type is explicitly specified. This differs from page to page.
     * @return array
     */
    private function getSearchFormProperties($defaultSearchType = 'all') {
        $dropdownTexts = [
            'all'                => 'All Search Results',
            'title'              => 'Titles and Abstracts',
            'research-interest'  => 'Research Interests and Themes',
            'member'             => 'Members'
        ];

        $placeholderTexts = [
            'all'                => 'Search everything',
            'title'              => 'Search through Titles and Abstracts',
            'research-interest'  => 'Search through Research Interests and Themes',
            'member'             => 'Search through Members'
        ];
        $formActions = [
            'all'                => route('all-search-results'),
            'title'              => route('search.projects'),
            'research-interest'  => route('search.research-interests'),
            'member'             => route('search.member-search')
        ];
        $searchType = request()->filled('searchType') ? request('searchType') : $defaultSearchType;

        return compact('searchType','dropdownTexts','placeholderTexts','formActions');
    }

  /**
   * Helper function to get all  stealth projects belonging to  the given user
   * @param  \Helix\Models\Person $user The current user
   * @return \Illuminate\Database\Eloquent\Collection
   */
  private function getStealthProjectsOf($user){
    $whereProjectIsStealth = function($query){
        $query->whereHas('visibility', function($q){
            $q->where('policy','private');
        });
    };
    return Person::with(['projects' => $whereProjectIsStealth])
        ->whereHas('projects', $whereProjectIsStealth)
        ->orWhere(function ($q){
            $q->whereDoesntHave('projects');
        })
        ->findOrFail($user->user_id)
        ->projects;
  }

    /**
     * Returns a query builder for searching through titles and abstracts
     *
     * @param \Illuminate\Database\Eloquent\Builder $query A project query builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
  private function searchTitlesAndAbstracts($query)
  {
      $detailSearch = Searchy::search('exploration.projects')
          ->fields('project_title','abstract')
          ->query(request('query'))
          ->select('project_id')
          ->get();

      $resultsId = collect($detailSearch)
          ->sortByDesc('relevance')
          ->unique()
          ->pluck('project_id');

      $idList=[];
      foreach ($resultsId as $projectId){
          $idList[] = explode(':',$projectId)[1];
      }
      $idsImploded = implode(',', $idList);
      $query->whereIn('project_id',$resultsId)
          ->orderByRaw(\DB::raw("FIELD(id, $idsImploded)"))
          ->with('pi','members','award');
      return $query;
  }

    /**
     * Allows the user to see appropriate projects based on visibility
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
  private function browseProjects() {
    // People can only browse for publishable projects
    $query = Project::with('pi')->where('is_publishable', true);

    if( auth()->check() )
    {
      //if the logged-in user is an Admin, they can see all projects:
      if (auth()->user()->hasRole('admin'))
      {
        return $query;
      }

      // Other Logged-in users can see public (showcase), internal (institutional), and their own stealth projects.

      // We need to wrap this in an advanced query because we are mixing
      // "where"- and 'orWhere'- clauses together in $query.
      $query = $query->where(function($qry){
        // Retrieve the stealth projects that belong to the currently logged-in user.
        $stealthProjects =  $this->getStealthProjectsOf(auth()->user())->modelKeys();
        // Logged in users can  see their own stealth projects.
        $qry->whereIn('project_id',$stealthProjects)
        // Logged in users can also see public and internal projects.
        ->orWhereHas('visibility', function($q){
          $q->whereIn('policy', ['public', 'internal']);
        });
      });
    }
    // Everyone else can only see public projects.
    else {
      $query = $query->whereHas('visibility', function($q){
          //Showcase projects
        $q->where('policy', 'public');
      });
    }
    return $query;
  }

    /**
     *  Another method that does a where call.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query The user's query builder
     * @param string $type The type of search based on column
     * @param string $filter The user's query
     * @return \Illuminate\Database\Eloquent\Builder
     */
   private function searchFilter($query, $type, $filter)
   {
      return $query->where($type , $filter);
   }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query User's query for member
     * @param string $search Member's id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function filterByMember($query, $search)
    {
        return $query->whereHas('allMembers', function($q) use ($search){
            $q->where('user_id', $search);
        });
    }

    /**
     * Returns a department list based on a query. This is the target of an AJAX
     * call from the filters.
     *
     * @return array
     */
   public function departmentSearch()
   {
      $data = Searchy::driver('simple')->search('nemo.academicDepartments')->fields('display_name')->query( request('q') )->getQuery()->limit(10)->get();
      if($data){
          foreach ($data as $department) {
              $tmp['id'] = $department->entities_id;
              $tmp['text'] = $department->display_name;
              $results[] = $tmp;
          }
          return $results;
      }
   }

    /**
     * Returns a members list based on a query. This is the target an AJAX call
     * from the filters.
     * NOTE: Might not be in use anymore
     *
     * @return array
     */
    public function getCollaboratorsList()
    {
        if (request()->filled('q')) {
            $data = Searchy::driver('simple')->users('display_name','first_name','last_name','middle_name')->query( request('q') )->getQuery()->limit(10)->get();
            // $data = Person::where('display_name', 'LIKE', "%".request()->q."%")->take(5)->get();
            if($data){
                foreach ($data as $person) {
                    $tmp['id'] = $person->user_id;
                    $tmp['text'] = $person->common_name;
                    $results[] = $tmp;
                }
                return $results;
            }
        }
    }

    /**
     * This is the ajax call from the personal-interests.blade.php, specifically
     * the load function from the select2 when picking a personal interest
     *
     * @return array
     */
    public function getPersonalInterests() {
        if (request()->filled('q')) {
            $data = Searchy::driver('simple')->search('fresco.personal_interests')->fields('title')->query(request('q'))->getQuery()->limit(10)->get();
            if ($data) {
                foreach ($data as $interest) {
                    $tmp['id'] = $interest->attribute_id;
                    $tmp['text'] = $interest->title;
                    $results[] = $tmp;
                }
                return $results;
            }
        }
    }

    /**
     * Returns the view for searching by research interests and themes
     *
     * @return \Illuminate\View\View
     */
    public function searchByResearchInterest()
    {
      $limit = env('SEARCH_RESULTS_LIMIT');
      // Character limit on the front end
      $RELATED_INTEREST_CHAR_LIMIT = 30;

      // Number of similar research interests shown
      $SIMILAR_SEARCH_TERMS_LIMIT = 10;

      //We are eagerloading to display extra data in the front end
      if(request()->filled('query'))
      {
        //search
        $query = request('query');

        $matchingInterests = Research::getAllLeavesInHierarchy($query);
        $interestIds = $matchingInterests->pluck('attribute_id');

        $people = Person::with('academicDepartments.department')
            ->has('academicDepartments')
            ->withResearchInterestsIn($interestIds)
            ->orderBy('last_name', 'asc');

        $projects = $this->browseProjects()
          ->withResearchInterestsIn($interestIds)
          ->has('interests') // Ensures that there aren't projects with no research interests
          ->latest();

        // Let's remove all the stop words from the query
        $queryWithoutStopWords = $this->removeStopWords($query);

        // With stop words removed, go ahead and search based on words given
        $similarSearchTerms = $this->getSimilarSearchTerms($queryWithoutStopWords, $SIMILAR_SEARCH_TERMS_LIMIT);
      }
      else
      { //Just get the latest results if they dont type anything.
        $query = null;
        $people = Person::with('academicDepartments.department', 'research_interests')
            ->has('research_interests') // Checks to see if user has research interests
            ->whereHas('academicDepartments', function($q){})
            ->orderBy('last_name', 'asc');

        $projects = $this->browseProjects()
            ->has('interests') // Ensures that there aren't projects with no research interests
            ->latest();
      }

        $people = $people
            ->paginate($limit);
        $projects = $projects
            ->paginate($limit);



        // Each person will have resulting research interests filtered by query if there is one
        foreach ($people as $person) {
            if (request('query')) {
                $relatedSearchResults = $person->research_interests->intersect($matchingInterests);
            } else {
                $relatedSearchResults = $person->research_interests;
            }
            $person->relatedSearchTerms = $relatedSearchResults;
        }

        // For each project, let's assign related search terms that match with the query and hierarchy
        foreach ($projects as $project) {
            if (request('query')) {
                $relatedSearchResults = $project->interests->intersect($matchingInterests);
            } else {
                $relatedSearchResults = $project->interests;
            }
            $project->relatedSearchTerms = $relatedSearchResults;
        }

        //Get the form properties of the search bar for the view.
        extract($this->getSearchFormProperties('research-interest'));

        //return a view from the results.
        return view('pages.search.searchresults', compact(
            'people',
            'projects',
            'query',
            'limit',
            'formActions',
            'dropdownTexts',
            'placeholderTexts',
            'searchType',
            'RELATED_INTEREST_CHAR_LIMIT',
            'similarSearchTerms'
        ));

    }

    /* --------------------------------------------------*/
    /* Routes used by the PUBLIC API.
    /*---------------------------------------------------*/

    /**
     * Returns an array for API calls
     *
     * @param string $include Optionally can specify members, email, or role
     * @return array
     */
    public function apiProjects($include = NULL)
    {
        $projects = Project::where('is_publishable', true)
            ->whereHas('visibility', function($q){
                $q->where('policy', 'public');
              });
          if($include == 'members'){
            $projects = $projects->with('members');
          }
          if(request()->filled('email')){
            $member = Person::where('email',request('email'))->firstOrFail();
            $projects = $this->filterByMember($projects, $member['user_id'])->get();
            foreach ($projects as &$project) {
               $project['role_position'] = NemoMembership::where('parent_entities_id',$project['project_id'])
                               ->where('individuals_id',$member['user_id'])
                               ->firstOrFail()['role_position'];
            }
            if(request()->filled('role')){
              $projects = $projects->where('role_position', request('role') );
            }
          }
          else $projects = $projects->get();
          return $this->sendResponse($projects, 'projects');
      }

    /**
     * Returns the view for searching by research interests and themes
     *
     * @return \Illuminate\View\View
     */
     public function seeMoreProjectsByResearchInterests()
    {
        $query = request('query');
        $RELATED_INTEREST_CHAR_LIMIT = 30;
        $matchingInterests = Research::getAllLeavesInHierarchy($query);
        $interestIds = $matchingInterests->pluck('attribute_id');

        extract($this->getSearchFormProperties('research-interest'));
        $limit = env('SEE_MORE_LIMIT');

        // Check to see if there is a query, else grab all the projects that have research interests
        if ($query) {
            $projects = $this->browseProjects()
                ->withResearchInterestsIn($interestIds)
                ->latest()
                ->paginate(12);
        } else {
            $projects = $this->browseProjects()
                ->has('interests')
                ->latest()
                ->paginate(12);
        }

        // If there is a query, get research interests that match the query
        // Otherwise, just grab all the research interests
        foreach ($projects as $project) {
            if (request('query')) {
                $relatedSearchResults = $project->interests->intersect($matchingInterests);
            } else {
                $relatedSearchResults = $project->interests;
            }
            $project->relatedSearchTerms = $relatedSearchResults;
        }

        return view(
            'pages.search.seemoreprojects',
            compact('projects','query','limit','searchType','dropdownTexts', 'formActions', 'RELATED_INTEREST_CHAR_LIMIT')
        );
    }

    /**
     * Returns a view that shows a paginated members by research interest
     *
     * @return \Illuminate\View\View
     */
    public function seeMorePeopleByResearchInterests() {

        extract($this->getSearchFormProperties('research-interest'));
        $limit = env('SEE_MORE_LIMIT');
        $query = request('query');
        // Character limit on the front end
        $RELATED_INTEREST_CHAR_LIMIT = 30;

        $matchingInterests = Research::getAllLeavesInHierarchy($query);
        $interestIds = $matchingInterests->pluck('attribute_id');
        // Each person will have resulting research interests filtered by query if there is one
        if ($query) {
            $people = Person::with('academicDepartments.department')
                ->whereHas('academicDepartments', function($q){})
                ->withResearchInterestsIn($interestIds)
                ->orderBy('last_name', 'asc')
                ->paginate(12);
        } else {
            $people = Person::with('academicDepartments.department', 'research_interests')
                ->has('research_interests')
                ->whereHas('academicDepartments', function($q){})
                ->orderBy('last_name', 'asc')
                ->paginate(12);
        }

        foreach ($people as $person) {
            if (request('query')) {
                $relatedSearchResults = $person->research_interests->intersect($matchingInterests);
            } else {
                $relatedSearchResults = $person->research_interests;
            }
            $person->relatedSearchTerms = $relatedSearchResults;
        }

         return view(
            'pages.search.seemorefaculty',
            compact('people','query','limit','searchType','dropdownTexts', 'RELATED_INTEREST_CHAR_LIMIT','formActions')
        );
    }

    /**
     * Return a view tha has all the pages. Search by titles and abstracts,
     * research interests and themes, members.
     *
     * @return \Illuminate\View\View
     */
    public function allSearchResults() {
        $RELATED_INTEREST_CHAR_LIMIT = 30;
        $SIMILAR_SEARCH_TERMS_LIMIT = 10;
        $limit = env('SEARCH_RESULTS_LIMIT');
        $query = request('query');
        extract($this->getSearchFormProperties('all'));

        $matchingInterests = Research::getAllLeavesInHierarchy($query);
        $interestIds = $matchingInterests->pluck('attribute_id');

        $peopleByResearchInterest = Person::with('academicDepartments.department')
            ->whereHas('academicDepartments', function($q){})
            ->withResearchInterestsIn($interestIds)
            ->orderBy('last_name', 'asc')
            ->paginate($limit);
        $peopleAsMembers = Person::with('academicDepartments.department')
            ->has('academicDepartments.department')
            ->facultyWithDepartment($query)
            ->orderBy('last_name', 'asc')
            ->paginate($limit);
        $projectsByTheme = $this->browseProjects()
            ->withResearchInterestsIn($interestIds)
            ->latest()
            ->paginate($limit);
        $projectsByTitleAndAbstract = $this->searchTitlesAndAbstracts($this->browseProjects())
            ->latest()
            ->paginate($limit);

        foreach ($peopleByResearchInterest as $person) {
            if (request('query')) {
                $relatedSearchResults = $person->research_interests->intersect($matchingInterests);
            } else {
                $relatedSearchResults = $person->research_interests;
            }
            $person->relatedSearchTerms = $relatedSearchResults;
        }

        foreach ($projectsByTheme as $project) {
            if (request('query')) {
                $relatedSearchResults = $project->interests->intersect($matchingInterests);
            } else {
                $relatedSearchResults = $project->interests;
            }
            $project->relatedSearchTerms = $relatedSearchResults;
        }

        if (request('query')) {
            // Let's remove all the stop words from the query
            $queryWithoutStopWords = $this->removeStopWords($query);

            // With stop words removed, go ahead and search based on words given
            $similarSearchTerms = $this->getSimilarSearchTerms($queryWithoutStopWords, $SIMILAR_SEARCH_TERMS_LIMIT);
        }

        return view(
            'pages.search.all-search-results',
            compact(
                'peopleAsMembers',
                'projectsByTitleAndAbstract',
                'projectsByTheme',
                'peopleByResearchInterest',
                'query',
                'limit',
                'searchType',
                'dropdownTexts',
                'formActions',
                'RELATED_INTEREST_CHAR_LIMIT',
                'similarSearchTerms'
            )
        );
    }
    /**
     * This will search for faculty members just like the Faculty Application.
     * NOTE: This leads to a test route for now because the actually faculty individual page.
     * For now, the page just displays the name of the user and their primary department.
     * NOTE: The only difference between this and the Faculty application is the way that
     * primary department is grabbed.
     *
     * @return \Illuminate\View\View
     */
    public function searchForMember() {
        $NUM_CARDS_DISPLAYED = 12;
        $search_query = request('query');
        $people = Person::with('academicDepartments.department')
            ->has('academicDepartments.department')
            ->facultyWithDepartment($search_query)
            ->orderBy('last_name', 'asc')
            ->paginate($NUM_CARDS_DISPLAYED);
        $people->setPath(url('search/members'));

        //Get the form properties of the search bar for the view.
        extract($this->getSearchFormProperties('member'));

        return view('pages.search.members', compact('people', 'searchType', 'dropdownTexts', 'formActions'));
    }

    /**
     * This function, given a query, returns a string that has no stop words (e.g. and, or, of).
     * NOTE: I left this in the search controller because I don't really see this being used elsewhere. On the off
     * chance that is it used outside this controller, this should be moved to the helpers file.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query User's query builder
     * @return string
     */
    private function removeStopWords($query) {
        // Let's make the query in an array so that we can get the difference.
        $queryWithoutStopWords = explode(' ', $query);
        $queryWithoutStopWords = array_diff($queryWithoutStopWords, getListOfStopWords());

        // Now, let's make it a string again.
        $queryWithoutStopWords = implode(' ', $queryWithoutStopWords);

        return $queryWithoutStopWords;
    }

    /**
     * This function returns similar research interests given a query. The assumption is that stop words are taken out,
     * but that's not necessary. We also combine similar research interest titles, that way the same research interest
     * name does not show up despite having different disciplines.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query User's query builder
     * @param int $limit Number of search terms to be shown
     * @return mixed
     */
    private function getSimilarSearchTerms($query, $limit = null) {

         // This grabs all the terms excluding those with zero count. This will be later implemented when count is fixed.
         $similarSearchTerms = Research::whereTitleContainsWords($query)->where('title', '!=', $query)
              ->where('count', '!=', 0)->orderBy('count', 'desc')->get();

         /**
          * This code shows similar search terms without the hit number, and I'm going to keep it just in case we want
          * to go back to not showing the numbers
          */
         // Finally, let's get the similar terms with the highest count
         // $similarSearchTerms = Research::whereTitleContainsWords($query)
         // ->where('title', '!=', $query)->orderBy('count', 'desc')->get();

        // Additionally, there might be different research interests with the same title, so we combine them
        $similarSearchTerms = $similarSearchTerms->groupBy('title');

        // Check if there's a limit imposed on the search
        if (!is_null($limit)) {
            $similarSearchTerms = $similarSearchTerms->take($limit);
        }

        return $similarSearchTerms;
    }

    /**
     * Returns the view that list all disciplines and sub-disciplines.
     *
     * @return \Illuminate\View\View
     */
    public function browseAllResearchInterests() {
        $parentInterests = Research::with('children')
            ->whereDoesntHave('parent')
            ->get()
            // Each level of the research interests should be alphabetically sorted.
            ->map(function ($parent){
                $parent->children = $parent->children->sortBy('title');
                return $parent;
            })
            ->sortBy('title');
        return view('pages.search.browse-all-research-interests',compact('parentInterests'));
    }
}
