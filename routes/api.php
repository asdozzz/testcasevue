<?php

use Illuminate\Http\Request;


Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        $user = $request->user();
        return $user;
    });

    Route::apiResource('projects', '\Asdozzz\Projects\Controller\ProjectsController');
    Route::get('projects/{id}/requirements', '\Asdozzz\Projects\Controller\RequirementsController@index');
    Route::apiResource('requirements', '\Asdozzz\Projects\Controller\RequirementsController');
    Route::put('requirements/{id}/sort', '\Asdozzz\Projects\Controller\RequirementsController@sort');
});