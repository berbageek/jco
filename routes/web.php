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

Route::group(['namespace' => 'Project'], function () {
    Route::resource('project', 'ProjectController');

    Route::group(['prefix' => 'projects/{project}', 'as' => 'project.'], function () {
        Route::resource('members', 'MemberController', ['only' => ['index', 'store', 'destroy']]);
        Route::resource('tasklists', 'TasklistController', ['only' => ['store', 'destroy']]);
        Route::resource('tasks', 'TaskController', ['only' => ['show', 'store']]);
        Route::resource('subtasks', 'SubtaskController', ['only' => ['store']]);
        Route::resource('comments', 'CommentController', ['only' => ['store']]);
        Route::resource('assignee', 'AssigneeController', ['only' => ['store']]);
        Route::resource('reports', 'ReportController', ['only' => ['index']]);
    });
});

Route::view('/', 'welcome');

// Route::resource('project', 'ProjectController');
// Route::resource('project.members', 'Project\MemberController', ['only' => ['index', 'store', 'destroy']]);
// Route::resource('project.tasklists', 'Project\TasklistController', ['only' => ['store', 'destroy']]);
// Route::resource('project.tasks', 'Project\TaskController', ['only' => ['show', 'store']]);
// Route::resource('project.subtasks', 'Project\SubtaskController', ['only' => ['store']]);
// Route::resource('project.comments', 'Project\CommentController', ['only' => ['store']]);
// Route::resource('project.assignee', 'Project\AssigneeController', ['only' => ['store']]);
// Route::resource('project.reports', 'Project\ReportController', ['only' => ['index']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
