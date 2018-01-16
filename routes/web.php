<?php

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

// CRUD project
Route::resource('projects', 'Project\ProjectController');

// Project members
Route::get('projects/{projectId}/members', 'Project\MemberController@index');
Route::post('projects/{projectId}/members', 'Project\MemberController@store');
Route::delete('projects/{projectId}/members/{memberId}', 'Project\MemberController@destroy');

// Project tasklists
Route::post('projects/{projectId}/tasklists', 'Project\TasklistController@store');
Route::delete('projects/{projectId}/tasklists/{tasklistId}', 'Project\TasklistController@destroy');

//Project tasks
Route::get('projects/{projectId}/tasks/{taskId}', 'Project\TaskController@show');
Route::post('projects/{projectId}/tasks', 'Project\TaskController@store');

// Subtasks
Route::post('Project\{projectId}/subtasks', 'Project\SubtaskController@store');

// Comment
// Project -> Tasklist -> Task -> Comment
Route::post('projects/{projectId}/comments', 'Project\CommentController@store');

// Assignee
Route::post('projects/{projectId}/assignee', 'Project\AssigneeController@store');

// Report
Route::get('projects/{projectId}/reports', 'Project\ReportController@index');

