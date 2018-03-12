<?php

namespace Asdozzz\Projects\Datasource;

class Projects extends \Asdozzz\Universal\Datasource\Universal
{
    function GetUsersById($id)
    {
        $res = \DB::table('users AS u')
            ->join('project_user_role AS p', 'p.user_id', '=', 'u.id')
            ->where('p.project_id', $id)->select('u.*')->get();

        return $res;
    }
}