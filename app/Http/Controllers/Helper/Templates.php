<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 19.03.2018
 * Time: 22:36
 */
namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;

class Templates extends Controller
{
    function all()
    {
        $list  = array(
            'main-button' => view('helper/templates/main-button')->render(),
            'main-panel' => view('helper/templates/main-panel')->render(),
            'scaner-form-wrapper' => view('helper/templates/scaner-form-wrapper')->render(),
            'scaner-form-line' => view('helper/templates/scaner-form-line')->render(),
            'scaner-form-item' => view('helper/templates/scaner-form-item')->render(),
            'scaner-form-empty' => view('helper/templates/scaner-form-empty')->render(),
            'list-local-forms-item' => view('helper/templates/list-local-forms-item')->render(),
            'list-local-forms' => view('helper/templates/list-local-forms')->render(),
        );

        return response()->json($list);
    }
}