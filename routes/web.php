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

Route::get('/', function () {

    $cl = new \Asdozzz\Projects\Business\Requirements();
    $input = [
        'data' => [
            'id' => null,
            'project_id' => 18,
            'parent_id' => null,
            'name' => 'asd2',
            'description' => 'adasd',
            'user_id' => null,
            /*'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null*/
        ]
    ];

    $res = $cl->model->create($input);
    die("<pre>" . print_r($res, true) . "</pre>");
    return $content;
});
