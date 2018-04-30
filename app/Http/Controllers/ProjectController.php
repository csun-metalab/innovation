<?php

declare(strict_types=1);

namespace Helix\Http\Controllers;

use Auth;
use DB;

use Helix\Contracts\CreateSeekingContract;
use Helix\Contracts\CreateTagContract;
use Helix\Contracts\GetUniversityEventsContract;
use Helix\Contracts\UpdateCollaboratorsContract;
use Helix\Contracts\UpdateProjectAttributesContract;
use Helix\Contracts\UpdateProjectGeneralContract;
use Helix\Contracts\UpdateProjectPolicyContract;
use Helix\Contracts\UpdateProjectPurposeContract;
use Helix\Contracts\VerifyProjectIdContract;
use Helix\Models\Attribute;
use Helix\Models\Interest;
use Helix\Models\Invitation;
use Helix\Models\Person;
use Helix\Models\Project;
use Helix\Models\ProjectPolicy;
use Helix\Models\Purpose;
use Helix\Models\Role;
use Helix\Models\Event;
use Helix\Models\Title;
use Helix\Models\Seeking;
use Illuminate\Http\Request;
use Searchy;

use WatsonSDK\Common\WatsonCredential;
use WatsonSDK\Common\SimpleTokenProvider;
use WatsonSDK\Services\NaturalLanguageUnderstanding;
use WatsonSDK\Services\NaturalLanguageUnderstanding\AnalyzeModel;

use Helix\Http\Requests\Project\ProjectCreate;
/**
 * Essentially the resource controller for projects. In addition, this has the
 * three steps for creating/editing a project and AJAX calls in those forms.
 */
class ProjectController extends Controller
{
    protected $projectIdVerifier = null;
    protected $projectGeneralUpdater = null;
    protected $projectAttributesUpdater = null;
    protected $projectPolicyUpdater = null;
    protected $projectPurposeUpdater = null;
    protected $createSeekingContract = null;
    protected $createTagContract = null;
    protected $getUniversityEventsContract = null;
    protected $collaboratorsUpdater = null;

    /**
     * ProjectController constructor.
     *
     * @param VerifyProjectIdContract         $verifyProjectIdContract
     * @param UpdateProjectGeneralContract    $updateProjectGeneralContract
     * @param UpdateProjectAttributesContract $updateProjectAttributesContract
     * @param UpdateProjectPolicyContract     $updateProjectPolicyContract
     * @param UpdateProjectPurposeContract    $updateProjectPurposeContract
     * @param CreateSeekingContract           $createSeekingContract
     * @param CreateTagContract               $createTagContract
     * @param GetUniversityEventsContract     $getUniversityEventsContract
     * @param UpdateCollaboratorsContract     $updateCollaboratorsContract
     */
    public function __construct(
        VerifyProjectIdContract $verifyProjectIdContract,
        UpdateProjectGeneralContract $updateProjectGeneralContract,
        UpdateProjectAttributesContract $updateProjectAttributesContract,
        UpdateProjectPolicyContract $updateProjectPolicyContract,
        UpdateProjectPurposeContract $updateProjectPurposeContract,
        CreateTagContract $createTagContract,
        GetUniversityEventsContract $getUniversityEventsContract,
        UpdateCollaboratorsContract $updateCollaboratorsContract,
        CreateSeekingContract $createSeekingContract
    ) {
        $this->middleware('auth', ['except' => [
            'index',
            'show',
            'apiProject',
            'updateCayuseProjects',
            'validateYoutube',
            'createAllProjectAttributes',
            'getCollaboratorsList',
            'getByCategoryType',
            'getWatsonTags'
        ]]);

        // $this->middleware(['project-write', 'helix-roles'], ['only' => [
        //     // 'create',
        //     'step1',
        //     'getStep2',
        //     'step2',
        //     'getStep3',
        //     'store',
        //     'destroy',
        // ]]);

        $this->projectIdVerifier = $verifyProjectIdContract;
        $this->projectGeneralUpdater = $updateProjectGeneralContract;
        $this->projectAttributesUpdater = $updateProjectAttributesContract;
        $this->projectPolicyUpdater = $updateProjectPolicyContract;
        $this->projectPurposeUpdater = $updateProjectPurposeContract;
        $this->collaboratorsUpdater = $updateCollaboratorsContract;
        $this->getUniversityEventsContract = $getUniversityEventsContract;
        $this->createTagContract = $createTagContract;
        $this->createSeekingContract = $createSeekingContract;
    }

    /**
     * Given a string, redirects to project show page with slug url.
     *
     * @param string $id  Project id or slug
     * @param bool   $api Flag for API request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id, $api = false)
    {
        if (str_contains($id, 'A1')) {
            $project = Project::where('project_number', $id)->firstOrfail();

            return redirect("project/$project->slug");
        } elseif (str_contains($id, 'innovate:')) {
            $project = Project::with('pi', 'members', 'award', 'links', 'image', 'visibilityPolicy','tags')->findOrFail($id);

            return redirect("project/$project->slug");
        }

        $project = Project::with('pi', 'members', 'award', 'links', 'image', 'visibilityPolicy','tags')->where('slug', $id)->firstOrFail();
        // This is to check if there is a row in the attributes table corresponding to this project
        $attributes = Attribute::with('purpose')->findOrNew($project->project_id);
        $event = Event::where('id', $attributes->event_id)->pluck('event_name');
        $seeking = Seeking::where('project_id',$project->project_id);
        if ($attributes->project_id == null) {
            $attributes->project_id = $project->project_id;
            // $attributes->purpose_name = 'project';
            $attributes->save();
            $attributes->load('purpose');
        }

        if ($project->isPrivate()) {
            if (!auth()->check()) {
                return redirect('login');
            }
            // If auth user is not a member of the project or an admin
            if (!(auth()->user()->isMember($project) || auth()->user()->hasRole('admin'))) {
                abort(403);
            }
        }

        if ($project->isInternal()) {
            // If user is not authenticated then abort
            if (!auth()->check()) {
                return redirect('login');
            }
        }
        // return $project->award;
        // $membership = $this->sortMembers($membership);
        if (\count($project->award)) {
            foreach ($project->award as &$award) {
                $sponsorList[] = $award->sponsor;
                $sponsorCode = $award->sponsor_code;
            }
            $project['sponsorList'] = \array_unique($sponsorList);
            $project['sponsorCode'] = $sponsorCode;
        }
        if ($api) {
            return $this->sendResponse($project, 'project');
        };
        return view('pages.project.show', \compact('project', 'attributes', 'event', 'seeking'));
    }

    /**
     * Redirects the user to step 1 with the intent of editing.
     *
     * @param string $id Project id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editRedirect($id)
    {
        session()->forget('new-project'); // TEMP FIX
        if (str_contains($id, '-')) {
            $id = Project::where('slug', $id)->firstOrFail()['project_id'];
        }

        return redirect('project/create/' . $id);
    }

    public function create()
    {
        $events = Event::where('application', env('APP_NAME'))->pluck('event_name', 'id');
        $titles = Title::where('application', env('APP_NAME'))->pluck('display_title', 'title_name');
        $projectStatus = 0;
        $project = new Project;
        return view('pages.project.create', \compact('project','projectPurposes','projectStatus','events','titles'));
    }
    public function edit($slug)
    {
        $titles = Title::where('application', env('APP_NAME'))->pluck('display_title', 'title_name');
        $events = Event::where('application', env('APP_NAME'))->pluck('event_name', 'id');
        $project = Project::with('members','tags','attribute','video','url','pendingInvitations')
                            ->slug($slug)
                            ->firstOrFail();
        $tags = [];
        foreach ($project->tags as $tag) {
            if($tag->relevance < 1){
                $tags['watson-stored:'.$tag->id.':'.$tag->relevance] = $tag->tag;
            }else{
                $tags['stored:'.$tag->id] = $tag->tag;
            }
        }
        $invitations = $project->pendingInvitations;
        $tagIds = array_keys($tags);
        $projectStatus = 1;
        return view('pages.project.create', \compact('project','projectStatus','tags','tagIds','invitations','events','titles'));
    }




    public function postCreate(ProjectCreate $project, $slug = null)

    {
        $projectId = null;
        if($slug){
            $projectId = Project::slug($slug)->firstOrFail()->project_id;
        }
        $projectAuthor = Auth::user()->user_id;
        $projectData = [
            'title'          => $project->title,
            'description'    => $project->description,
            'project_type'   => $project->project_type,
            'project_author' => $projectAuthor,
            'event_id'       => $project->event_id,
            'url'            => $project->url ?: NULL,
            'video'          => $project->video?: NULL,
            'collaborators'  => $project->collaborators,
            'seeking'        => $project->seeking
        ];
        if(!$project->tags){
            $project->tags = [];
        }

        $tags = $this->tagsDecode($project->tags);
        $projectId = $this->projectIdVerifier->verifyId($projectId);
        $this->projectGeneralUpdater->updateProjectGeneral($projectId, $projectData);
        $this->projectPolicyUpdater->updateProjectPolicy($projectId, $projectData);
        $this->collaboratorsUpdater->updateCollaborators($projectId, $projectData);
        $this->projectAttributesUpdater->updateProjectAttributes($projectId,$projectData);
        $this->createTagContract->createTag($projectId, $tags);
        foreach($projectData->seeking as $seeking){
                $this->createSeekingContract->createSeeking($projectId,$seeking);
        }
        $project = Project::find($projectId)->firstOrFail();
        $project->searchable();
        return redirect('project/' . $projectId);
    }
    private function tagsDecode(array $tags)
    {
        foreach ($tags as &$tag) {
            if( str_contains($tag,'watson:') || str_contains($tag,'watson-stored:') ){
                $data = explode(':', $tag);
                $text = $data[1];
                $relevance = $data[2];
            }
            else{
                $text = $tag;
                $relevance = 1;
            }
            $tag = compact('text','relevance');
        }
        return $tags;
    }


    /**
     * Handles the information given from step 1 and session information.
     *
     * @param StepOneRequest $request   The custom request form for step 1
     * @param string         $projectId Project id or null if new project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function step1(StepOneRequest $request, $projectId = null)
    {
        if (session('new-project')) {
            if (\array_key_exists('project_general', session('new-project'))) {
                // Remove everything except cayuse_project - this array key is used to run checks on back end and front end
                session()->forget([
                    'new-project.project_general.project_type',
                    'new-project.project_general.project_purpose',
                    'new-project.project_general.description',
                    'new-project.project_general.start_date',
                    'new-project.project_general.end_date',
                    'new-project.project_general.url',
                ]);
            }
        }

        // Title is always editable if you are an admin, otherwise it's editable if the project is not from cayuse.
        if (!session('new-project.project_general.cayuse_project') || auth()->user()->hasRole('admin')) {
            session()->put([
                'new-project.project_general.title' => \trim(request('title')),
                'new-project.project_general.cayuse_project' => false,
            ]);
        }
        session()->put([
            'new-project.project_general.project_type' => request('project_type'),
            'new-project.project_general.project_purpose' => request('project_purpose'),
            'new-project.project_general.description' => \trim(request('description')),
            'new-project.project_general.start_date' => request('start_date'),
            'new-project.project_general.end_date' => request('end_date'),
            'new-project.project_general.url' => \trim(request('url')),
            'new-project.project_general.youtube' => \trim(request('youtube')),
        ]);

        return isset($projectId) ? redirect('project/step-2/' . $projectId) : redirect('project/step-2');
    }

    /**
     * Handles AJAX call from step 1 to validate YouTube URL in the form.
     *
     * @param Request $request YouTube URL from AJAX call
     *
     * @return string
     */
    public function validateYoutube(Request $request)
    {
        $youtube_url = request()->url;
        $rx = '#(https?://(?:www\.)?youtube\.com/watch\?v=([^&]+?))|((https?://(?:www\.)?)(youtu\.be){1})|((https?://(?:www\.)?(vimeo\.com){1}))#';

        if (\preg_match($rx, $youtube_url)) {
            $response = true;
        } else {
            $response = false;
        }

        return \json_encode($response);
    }

    /**
     * Returns the view for step 2 and handles the AJAX call for populating
     * interests in the front end.
     * NOTE: Because of browser caching, the AJAX causes an error because the
     * page loads form cache and the route only does the AJAX call.
     *
     * @param string $projectId Project id or null if new project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    // public function getStep2($projectId = null)
    // {
    //     if (!session('new-project')) {
    //         return back();
    //     }

    //     // TODO: refactor everything to the back end

    //     return view('pages.project.two', \compact('categories', 'subcategories'));
    // }

    /**
     * MARK FOR DELETION.
     *
     * Handles the information given from step 2 and session information
     *
     * @param string $projectId Project id or null if new project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    // public function step2($projectId = null)
    // {
    //     return redirect('project/step-3/' . $projectId ?: '');
    // }

    /**
     * Returns the view for step 3 and handles the AJAX call for populating
     * collaborators in the front end.
     * NOTE: Because of browser caching, the AJAX causes an error because the
     * page loads form cache and the route only does the AJAX call.
     *
     * @param string $projectId Project id or null if new project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|int|string
     */
    // public function getStep3($projectId = null)
    // {
    //     if (!session('new-project')) {
    //         return back();
    //     }
    //     if (!session('new-project.collaborators')) {
    //         if ($projectId) {
    //             $projectCollaborators = Project::findOrFail($projectId)->allMembers->toArray();
    //             if (!empty($projectCollaborators)) {
    //                 session()->put('new-project.collaborators', stringifyCollaborators($projectCollaborators));
    //             }
    //         }
    //     }

    //     if (request()->wantsJson()) {
    //         $results = 0;

    //         if (\array_key_exists('collaborators', session('new-project'))) {
    //             $results = \json_encode(session('new-project')['collaborators']);
    //         }

    //         return $results;
    //     }
    //     $roles = Role::orderBy('rolename_id')->roleNames()->pluck('display_name', 'display_name');
    //     $seekingCollaborators = 0;
    //     $seekingStudents = 0;
    //     $studentQualifications = null; // = '';
    //     if (isset($projectId)) {
    //         $project = Project::with('attribute')->findOrFail($projectId);
            // $invitations = $project->invitations()->whereNull('updated_at')->get();
    //         $seekingCollaborators = $project->attribute ? $project->attribute->seeking_collaborators : $seekingCollaborators;
    //         $seekingStudents = $project->attribute ? $project->attribute->seeking_students : $seekingStudents;
    //         $studentQualifications = $project->attribute ? $project->attribute->student_qualifications : $studentQualifications;
    //     }

    //     return view(
    //         'pages.project.three',
    //         \compact(
    //             'roles',
    //             'invitations',
    //             'seekingCollaborators',
    //             'seekingStudents',
    //             'studentQualifications'
    //         )
    //     );
    // }

    /**
     * MARK FOR DELETION.
     *
     * Validates all session information and fires a ProjectCreatedOrUpdated
     * event to create/edit a project
     *
     * @param string $projectId Project id or null if new project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function store($projectId = null)
    {
        $collaborators = null !== request('collaborators') ? \array_filter(request('collaborators')) : [];

        if (\array_key_exists('collaborators', session('new-project'))) {
            session()->forget('new-project.collaborators');
        }

        if (!empty($collaborators)) {
            session()->put('new-project.collaborators', $collaborators);
            session()->put('new-project.seeking.collaborators', request('seekingCollaborators') ?: 0);
            session()->put('new-project.seeking.students', request('seekingStudents') ?: 0);
            if (request('seekingStudents') && request('studentQualifications')) {
                session()->put('new-project.seeking.qualifications', request('studentQualifications'));
            } else {
                session()->put('new-project.seeking.qualifications', null);
            }
        }

        if (request('action') == 'back') {
            return isset($projectId) ? redirect('project/step-2/' . $projectId) : redirect('project/step-2');
        }

        // Validation for collaborators array
        if (\count(collaboratorErrors($collaborators))) {
            return back();
        }
        if (null === $projectId) {
            $projectId = generateNewProjectId();

            Project::create([
                'project_id' => $projectId,
            ]);
        }

        $project = Project::findOrFail($projectId);
        event(new \Helix\Events\Project\ProjectCreatedOrUpdated($project, session('new-project')));

        session()->forget('new-project');

        return view('pages.project.four', \compact('project'));
    }

    /**
     * Deletes project and all associated information.
     *
     * @param string $id Project id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // If project is cayuse project
        if (null !== $project->cayuse_id) {
            return redirect('project')->with('error', 'You are unable to delete this project.');
        }

        // Lazy load the interests to a project to iterate and decrement
        $project->load('interests');

        // Grabs all the projects research interests and decrements each interest
        foreach ($project->interests as $interest) {
            $interest->decrement('count');
        }

        DB::transaction(function () use ($project) {
            $project->allMembers()->detach();
            $project->interests()->detach();
            $project->invitations()->delete();
            $project->policies()->delete();
            $project->delete();
        });

        // By default, redirect user to project index page
        $url = 'project';

        // If delete route was triggered from admin dashboard, redirect them there
        if (str_contains(url()->previous(), 'admin')) {
            $url = 'admin/dashboard';
        }

        return redirect($url)->with('success', 'Project Successfully Deleted');
    }

    /**
     * Organizes members associated with a project.
     * NOTE: Might not be used anywhere.
     *
     * @param Collection $membership All members of a project
     *
     * @return array
     */
    private function sortMembers($membership)
    {
        $pi = $membership->where('role_position', 'Lead Principal Investigator')->flatten();
        $copi = $membership->where('role_position', 'Principal Investigator')->flatten();
        $editor = $membership->where('role_position', 'Proposal Editor')->flatten();
        $researcher = $membership->where('role_position', 'Investigator')->flatten();

        $members = [
            'pi' => $pi,
            'copi' => $copi,
            'editor' => $editor,
            'researcher' => $researcher,
        ];

        return $members;
    }

    /* --------------------------------------------------*/
    /* Routes used by the VUE components for collaborators.
    /*---------------------------------------------------*/

    /**
     * Used for searching through collaborators, similar to members search.
     * NOTE: Might not be used anywhere.
     *
     * @return array
     */
    public function getCollaboratorsList()
    {
        config(['scout.driver'=>'tntsearch']);
        if (request()->filled('q')) {
            $data = Person::search(request('q'))->get()->take(10);
            if ($data) {
                foreach ($data as $person) {
                    $tmp['id'] = $person->user_id;
                    $tmp['text'] = $person->display_name;
                    $results[] = $tmp;
                }
                return $results;
            }
        }
    }

    /**
     * Returns an array of display names for roles a member can have.
     *
     * @return array
     */
    public function getRolesList()
    {
        return Role::whereIn('system_name', ['Lead Principal Investigator', 'Principal Investigator', 'Co-Principal Investigator', 'Investigator'])->pluck('display_name', 'rolename_id')->toArray();
    }

    /**
     * Returns an invitation collection of a particular project.
     *
     * @param string $id Project id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCurrentCollaborators($id)
    {
        return Invitation::with('invitee', 'role')->where('project_id', $id)->get();
    }

    /**
     * Adds Cayuse projects to the database from the sync script.
     *
     * @return string
     */
    public function updateCayuseProjects()
    {
        if (env('API_WRITE') == request('api_key')) {
            $projects = Project::whereNull('slug')->get();
            $count = 0;

            if (\count($projects)) {
                foreach ($projects as $project) {
                    // Assign a slug to cayuse project
                    $project->slug = slugify($project->project_title);
                    $project->save();

                    // Create visibility, invitation, and approval policies for cayuse project
                    $project->policies()->saveMany([
                        new ProjectPolicy(['policy_type' => 'invitation', 'policy' => 'self']),
                        new ProjectPolicy(['policy_type' => 'approval', 'policy' => 'pi/copi']),
                        new ProjectPolicy(['policy_type' => 'visibility', 'policy' => 'internal']),
                    ]);

                    // Increment count
                    ++$count;
                }
            }

            return $count . ' ' . str_plural('project', $count) . ' received a slug and policies!';
        }

        // api key was missing or invalid
        abort(403);
    }

    /* --------------------------------------------------*/
    /* Routes used by the PUBLIC API.
    /*---------------------------------------------------*/

    /**
     * Uses the show method and returns a response of type project.
     *
     * @param string $id  Project id
     * @param bool   $api API flag defaulted to true
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function apiProject($id, $api = true)
    {
        if (str_contains($id, 'A1')) {
            $id = Project::where('project_number', $id)->firstOrfail()['slug'];
        } elseif (str_contains($id, 'projects:')) {
            $id = Project::findOrFail($id)['slug'];
        }

        return $this->show($id, $api);
    }

    /* --------------------------------------------------*/
    /* Routes used by the Interest components.
    /*---------------------------------------------------*/

    /**
     * Returns a research collection of all of the research interests without
     * parents.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    // public function getCatagory()
    // {
    //     return Research::whereNull('parent_attribute_id')->get();
    // }

    /**
     * ???
     *
     * @param string $id Research id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    // public function getSub($id)
    // {
    //     return Research::where('parent_attribute_id', $id)->select('title', 'attribute_id as id')->get();
    //     return Research::where('parent_attribute_id', $id)->select('attribute_id as id', 'title')->get();
    // }

    /**
     * ???
     *
     * @param string $id Research id
     *
     * @return array
     */
    // public function getTags($id)
    // {
    //     $subcatagories = Research::where('parent_attribute_id', $id)->with('children')->get();
    //     $tags = [];
    //     foreach ($subcatagories as $child) {
    //         \array_push($tags, $child->children);
    //     }

    //     return $tags = array_collapse($tags);
    //     // return $tags = array_pluck($tags,'title','attribute_id');

    //     $tags = array_collapse($tags);

    //     return $tags;
    // }

    /**
     * ???
     *
     * @param string $id Research id
     *
     * @return array|\Illuminate\Http\JsonResponse
     */
    // public function getByCategoryType($id)
    // {
    //     switch (request('type')) {
    //         // A category was selected, so grab the subcategory and that subcategories tags
    //         case 'category':
    //             $subcategories = Research::where('parent_attribute_id', $id)
    //                                 ->select('title', 'attribute_id as id')
    //                                 ->orderBy('title', 'ASC')
    //                                 ->get();

    //             $tags = Research::where('parent_attribute_id', $subcategories[0]->id)
    //                                 ->select('title', 'attribute_id as id')
    //                                 ->orderBy('title', 'ASC')
    //                                 ->get();

    //             return [
    //                 'subcategories' => $subcategories,
    //                 'tags' => $tags,
    //                 'type' => request('type'),
    //             ];
    //         break;
    //         // A subcategory was selected so grab its tags
    //         case 'subcategory':
    //             $tags = Research::where('parent_attribute_id', $id)->select('title', 'attribute_id as id')->get();

    //             return [
    //                 'tags' => $tags,
    //                 'type' => request('type'),
    //             ];
    //         break;
    //         default:
    //             return response()->json(['status' => 'There was an error with your request.'], 422);
    //     }
    // }

    /**
     * This will be called via AJAX by an admin to toggle a project's isFeatured flag.
     *
     * @param string $projectId Project id
     *
     * @return array
     */
    public function toggleFeatured($projectId)
    {
        $maxFeaturedProjects = 3;

        if (!auth()->user()->hasRole('admin')) {
            return [
                'message' => 'You are not authorized to feature projects.',
                'status' => 401,
            ];
        }
        //This reduces the number of database calls by 1 per click of the star.
        //It is a collection consisting of all featured projects and the current project.
        //We need the currently featured projects to see if there are too many already.
        $attributesToConsider = Attribute::where('project_id', $projectId)
            ->orWhere('is_featured', true)
            ->get();

        $currentProjAttr = $attributesToConsider->find($projectId);
        if (null === $currentProjAttr) {
            return [
                'message' => 'Project not found.',
                'status' => 404,
            ];
        }

        // Checking if we are allowed to feature this project (Dependent on  $maxFeaturedProjects)
        if (!$currentProjAttr->is_featured) {
            //Exclude the current project because it is not featured.
            $featuredProjectCount = $attributesToConsider->count() - 1;
            if ($featuredProjectCount >= $maxFeaturedProjects) {
                return[
                    'message' => "There are already ${maxFeaturedProjects} projects that are currently featured. Please un-feature one of them before featuring this project.",
                    'status' => 400,
                ];
            }
        }

        //Toggle is_featured.
        $currentProjAttr->is_featured = !$currentProjAttr->is_featured;
        $currentProjAttr->touch();
        $currentProjAttr->save();

        return [
            'is_featured' => (bool) $currentProjAttr->is_featured,
            'message' => 'This project was successfully' . ($currentProjAttr->is_featured ? ' featured.' : ' un-featured.'),
            'status' => 204,
        ];
    }

    /**
     * Creates a seeder based on current interests.
     */
    public function seeder()
    {
        $Interest = Interest::all();
        foreach ($Interest as $k) {
            if ($k->parent_attribute_id == null) {
                $k->parent_attribute_id = 'NULL';
            }
            if ($k->hierarchy == null) {
                $k->hierarchy = 'NULL';
            }
            echo "Interest::create([<br>
                      'attribute_id' =>" . '"' . $k->attribute_id . '"' . ",<br>
                      'title' =>" . '"' . $k->title . '"' . ", <br>
                      'short_name' => 'NULL' ,<br>
                      'parent_attribute_id' =>" . '"' . $k->parent_attribute_id;
            echo  '"' . ",<br>
                      'hierarchy' =>" . '"' . $k->hierarchy;
            echo  '"' . ",<br>
                      'count' => '0' <br>
                    ]);<br><br>";
        }
    }

    /**
     * Queries the entire projects table for projects that don't have
     * attributes, and creates corresponding attributes with default values.
     * Returns a count of how many attributes were  created.
     *
     * @return int
     */
    public function createAllProjectAttributes()
    {
        if (env('API_WRITE') != request('api_key')) {
            abort(403);
        }

        // A laravel collection of primary keys of projects that don't have attributes";
        $projectIds = collect(Project::whereDoesntHave('attribute')->get()->modelKeys());

        // An laravel collection of bulk-insertable values for new attributes. They will be inserted all at once.
        $newAttributeValues = $projectIds->map(function ($projectId) {
            return [
                'project_id' => $projectId,
                'purpose_name' => Purpose::defaultPurpose(),
            ];
        });
        // Insert the new attributes into the Attributes table.
        Attribute::insert($newAttributeValues->toArray());

        return $newAttributeValues->count();
    }

    public function getWatsonTags(Request $request, $data = null, $relevance = 0.5)
    {   
        if($request->filled('data')){
            $data = $request->get('data');
        }
        $nlu = new NaturalLanguageUnderstanding( WatsonCredential::initWithCredentials(env('WATSON_USER_NAME'), env('WATSON_PASSWORD')) );
        $model = new AnalyzeModel($data, ['concepts'=>['limit'=>50]]);
        $result = $nlu->analyze($model);
        $responseData =  json_decode($result->getContent());

        if($responseData){
            $data = array_filter($responseData->concepts, function ($tag) use ($relevance) { 
                return ($tag->relevance >= $relevance);
            });
        }else{
            $data = null;
        }
        return $data;
    }
}
