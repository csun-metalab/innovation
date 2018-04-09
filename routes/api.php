<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('seed', 'ProjectController@seeder');
// AJAX Routes for collaborators JS component
Route::get('collaborators', 'ProjectController@getCollaboratorsList');
Route::get('collaborators/search', 'SearchController@getCollaboratorsList');
Route::get('roles', 'ProjectController@getRolesList');
Route::get('projects/{id}/edit/collaborators', 'ProjectController@getCurrentCollaborators');
Route::get('departments', 'SearchController@departmentSearch');

// SCRIPT TO BE RUN AFTER CAYUSE IMPORT
Route::get('update/slugs', 'ProjectController@slugsMissing');

// Helix API for profiles
Route::get('profile/image/{email}', 'ImageController@getFacultyProfileImage');

Route::get('projects', 'SearchController@apiProjects'); // with member / email for person
Route::get('projects/{id}', 'ProjectController@apiProject'); // slug , id, cayuse id
Route::get('{include}/projects', 'SearchController@apiProjects'); // with member / email for person
Route::get('update/cayuse-projects', 'ProjectController@updateCayuseProjects');
Route::get('init/project-attributes', 'ProjectController@createAllProjectAttributes');
Route::post('/validateYoutube', 'ProjectController@validateYoutube')->name('validateYoutube');