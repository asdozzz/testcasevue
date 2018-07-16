<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 16.07.2018
 * Time: 22:19
 */
Route::middleware(['helper'])->group(function () {

    Route::get('/helper/templates', 'Helper\Templates@all');
});