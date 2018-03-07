<?php
Route::get('seed','ProjectController@seeder');
// AJAX Routes for collaborators JS component
Route::get('collaborators','ProjectController@getCollaboratorsList');
Route::get('collaborators/search','SearchController@getCollaboratorsList');
Route::get('roles','ProjectController@getRolesList');
Route::get('projects/{id}/edit/collaborators','ProjectController@getCurrentCollaborators');
Route::get('departments', 'SearchController@departmentSearch');
Route::get('personal-interests', 'SearchController@getPersonalInterests');

//Api calls for searching interests.
Route::get('search/research-interests','SearchController@searchByResearchInterestApi');

// Api calls for fetching project interests, might be deprecated
// Route::post('inters/create', 'ProjectController@newExpertise');
Route::get('interests/catagories','ProjectController@getCatagory');
Route::get('interests/subcatagory/{id}','ProjectController@getSub');
Route::get('interests/tags/{id}','ProjectController@getTags');
Route::get('interests/categories/{id}', 'ProjectController@getByCategoryType');

// SCRIPT TO BE RUN AFTER CAYUSE IMPORT
Route::get('update/slugs','ProjectController@slugsMissing');

// Helix API for profiles
Route::get('profile/image/{email}', 'ImageController@getFacultyProfileImage');

Route::get('projects','SearchController@apiProjects'); // with member / email for person
Route::get('projects/{id}', 'ProjectController@apiProject'); // slug , id, cayuse id
Route::get('{include}/projects','SearchController@apiProjects'); // with member / email for person
Route::get('update/cayuse-projects','ProjectController@updateCayuseProjects');
//Todo: Uncomment this after talking to Matt.
Route::get('init/project-attributes', 'ProjectController@createAllProjectAttributes');