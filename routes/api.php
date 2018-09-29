<?php

use Illuminate\Http\Request;


Route::middleware(['auth:api'])->group(function () {

    Route::get('/user', function (Request $request) {
        /** @var \App\User $user*/
        $user = $request->user();
        $user->permissions = $user->getPermissions();
        return $user;
    });

    /*Projects routes*/
    Route::apiResource('projects', '\Asdozzz\Projects\Controller\ProjectsController');
    Route::post('projects/all', '\Asdozzz\Projects\Controller\ProjectsController@all');
    Route::get('projects/{id}/users', '\Asdozzz\Projects\Controller\ProjectsController@GetUsersById');

    Route::apiResource('requirements', '\Asdozzz\Projects\Controller\RequirementsController');
    Route::post('requirements/sort', '\Asdozzz\Projects\Controller\RequirementsController@sort');

    /*Tasks routes*/
    Route::apiResource('tasks', '\Asdozzz\Tasks\Controller\TasksController');
    Route::get('tasks/{id}/users', '\Asdozzz\Tasks\Controller\TasksController@GetUsersById');
    Route::get('tasks/{id}/changes', '\Asdozzz\Tasks\Controller\TasksController@GetChangesById');

    Route::apiResource('tasks_statuses', '\Asdozzz\Tasks\Controller\StatusesController');
    Route::post('tasks_statuses/all', '\Asdozzz\Tasks\Controller\StatusesController@all');

    Route::apiResource('tasks_priorities', '\Asdozzz\Tasks\Controller\PrioritiesController');
    Route::post('tasks_priorities/all', '\Asdozzz\Tasks\Controller\PrioritiesController@all');

    Route::apiResource('tasks_trackers', '\Asdozzz\Tasks\Controller\TrackersController');
    Route::post('tasks_trackers/all', '\Asdozzz\Tasks\Controller\TrackersController@all');

    Route::apiResource('tasks_comments', '\Asdozzz\Tasks\Controller\TaskChangesController');

    Route::apiResource('users', '\Asdozzz\Users\Controller\UsersController');
});