<?php

use Illuminate\Http\Request;


Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        $user = $request->user();
        return $user;
    });

    Route::apiResource('projects', '\Asdozzz\Projects\Controller\ProjectsController');
});