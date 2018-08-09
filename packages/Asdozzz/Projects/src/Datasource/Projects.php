<?php

namespace Asdozzz\Projects\Datasource;

class Projects extends \Asdozzz\Universal\Datasource\Universal
{
    function GetUsersById($id)
    {
        $res = \DB::table('users AS u')
            ->join('project_user_role AS p', 'p.user_id', '=', 'u.id')
            ->join('project_roles AS pr', 'p.role_id', '=', 'pr.id')
            ->where('p.project_id', $id)->select('u.*','pr.slug as role','pr.id as role_id')->get();

        return $res;
    }
}