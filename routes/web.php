<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['web']], function () {
    // Helix Welcome
    Route::get('/', 'WelcomeController@index')
        ->name('welcome');
    Route::get('about/version-history', 'WelcomeController@aboutIndex')
        ->name('about.versions');
    Route::get('about/browser-support', 'WelcomeController@aboutIndex')
        ->name('about.browsers');
    // Route::get('about/faq', 'WelcomeController@aboutIndex');
    // Route::get('about/api', 'WelcomeController@aboutIndex');
    // FEEDBACK
    Route::get('feedback', 'FeedbackController@getIndex');
    Route::post('feedback', 'FeedbackController@postIndex');
    //Search

    // Route::get('search/research-interests','SearchController@searchByResearchInterest')
    //     ->name('search.research-interests');
    // Route::get('search/research-interests/faculty', 'SearchController@seeMorePeopleByResearchInterests')
    //     ->name("see-more-faculty");
    // Route::get('search/research-interests/projects', 'SearchController@seeMoreProjectsByResearchInterests')
    //     ->name('see-more-projects');
    Route::get('search/everything', 'SearchController@allSearchResults')
        ->name('all-search-results');
    Route::get('search/members', 'SearchController@searchForMember')
        ->name('search.member-search');
    // Route::get('browse/research-interests','SearchController@browseAllResearchInterests')
    //     ->name('browse.research-interests');
    // Authentication
    Route::get('login', 'AuthController@getLogin')
        ->name('login');
    Route::post('login', 'AuthController@postLogin')
        ->name('login.post');
    Route::get('logout', 'AuthController@getLogout')
        ->name('logout');
    // Projects
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', 'SearchController@index')
            ->name('search.projects');

        Route::get('new', function () {
            return view('pages.project.create');
        });
        Route::get('create', 'ProjectController@create')
            ->name('project.create.get');
        Route::post('create', 'ProjectController@postCreate')
            ->name('project.create.post');

        Route::post('step-1/{projectId?}', 'ProjectController@step1')
            ->name('project.edit.step-1.post');
        Route::get('step-2/{projectId?}', 'ProjectController@getStep2')
            ->name('project.edit.step-2');
        Route::post('step-2/{projectId?}', 'ProjectController@step2')
            ->name('project.edit.step-2.post');
        Route::get('step-3/{projectId?}', 'ProjectController@getStep3')
            ->name('project.edit.step-3');
        Route::post('step-3/{projectId?}', 'ProjectController@store')
            ->name('project.edit.step-3.post');
        Route::get('{id}', 'ProjectController@show')
            ->name('project.show');
        Route::get('{id}/delete', 'ProjectController@destroy')
            ->name('project.delete');
        Route::get('{id}/edit', 'ProjectController@editRedirect')
            ->name('project.edit');
        // Image upload routes
        Route::get('{id}/upload-image', 'ImageController@create')
            ->name('project.photo-upload');
        Route::post('{id}/store-image', 'ImageController@store')
            ->name('project.photo-store');
        Route::get('{id}/crop-image', 'ImageController@crop')
            ->name('project.photo-crop');
        Route::post('{id}/crop-image', 'ImageController@postCrop')
            ->name('project.photo-post-crop');
        Route::get('{id}/delete-image', 'ImageController@destroy')
            ->name('project.photo-delete');
        Route::put('{projectId}/toggle-featured', 'ProjectController@toggleFeatured')
            ->name('project.toggle-featured');
        // Invitations
        Route::get('{projectId}/invitation/{inviteId}/accept', 'InvitationController@acceptInvitation')
            ->name('dashboard.invitations.accept');
        Route::get('{projectId}/invitation/{inviteId}/reject', 'InvitationController@rejectInvitation')
            ->name('dashboard.invitations.reject');
        Route::get('{projectId}/invitation/{invitedId}/cancel', 'InvitationController@cancelInvite')
            ->name('dashboard.invitations.cancel');
        Route::get('{projectId}/request', 'InvitationController@selfInvitation')
            ->name('project.request-to-join');
        // IMPORTANT: Client has requested not to allow auto joining projects. Leave route alone for now.
        // Route::get('{projectId}/join', 'InvitationController@joinProject');
        // This is the route for when a student requests to join a project
        Route::get('{projectId}/student-request', 'InvitationController@studentRequest')
            ->name('student-request-form');
        // This route is called when the student submits the request form.
        Route::post('{projectId}/student-request/sent', 'InvitationController@processStudentRequest')
            ->name('student-request-sent');
    });
    // route for youtube validation
    Route::group(['prefix' => 'admin'], function () {
        Route::get('dashboard', 'PersonController@adminPanel');
        Route::get('dashboard/invitations', 'PersonController@dashboardInvitation')
            ->name('dashboard.invitations');
        Route::get('dashboard/events', 'UniversityEventController@universityEvents')
            ->name('dashboard.events');
    });

    Route::post('test', 'ProjectController@PostProjectCreation');
});
/*
|---------------------------------------------------------------
| TEST ROUTES
| Please write function within if statement
|---------------------------------------------------------------
*/
if (app()->environment('local')) {
    // Miscellaneous routes
    // Todo: Delete this after uncommenting the equivalent route above.
    Route::get('init/project-attributes', 'ProjectController@createAllProjectAttributes');
    Route::get('see-more-projects', function () {
        return view('pages.search.seemoreprojects');
    });
    Route::get('test/HELIX-756/fake-cayuse', function () {
        //Get all non-cayuse test projects for this ticket.
        $projects = \Helix\Models\Project::with('pi')
            ->where('project_title', 'LIKE', '%HELIX-756%')
            ->whereCayuseId(null)
            ->get();
        $nextCayuseId = \Helix\Models\Project::whereNotNull('cayuse_id')
            ->orderBy('cayuse_id', 'desc')
            ->first()
            ->cayuse_id;
        foreach ($projects as $project) {
            $piUserId = $project->pi->user_id;
            $project->cayuse_id = ++$nextCayuseId;
            $project->pi_pid = getNumberFromIdString($piUserId);
            $project->touch();
            $project->save();
        }

        return $projects;
    });
    // Expertise Search
    Route::get('profiles', function () {
        return view('pages.landing.profiles');
    });
    Route::get('profile', function () {
        return view('pages.profiles.profile');
    });
    Route::get('profile_template', function () {
        return view('profile_template');
    });
    Route::get('faculty_profile', function () {
        return view('pages.profiles.faculty_profile');
    });
    Route::get('home', function () {
        return view('pages.profiles.home');
    });
    Route::get('Profiles', function () {
        return view('Profiles');
    });
    Route::get('classes', function () {
        return view('pages.profiles.classes');
    });
    Route::get('projects', function () {
        return view('pages.profiles.projects');
    });
    Route::get('publications', function () {
        return view('pages.profiles.publications');
    });
    Route::get('committees', function () {
        return view('pages.profiles.committees');
    });
    Route::get('edit', function () {
        return view('pages.profiles.edit');
    });
    Route::get('session', function () {
        session()->forget('new-project');
        session()->forget('can-edit-project-projects:91');
        session()->forget('can-edit-project-projects:1');

        return redirect('project');
    });
    /**
     * This is the test route for member searching. This is going to be get replaced
     * when the page is created.
     */
    Route::get('memberSearchTest', 'SearchController@searchForMember')->name('test.search.member-search');
}
