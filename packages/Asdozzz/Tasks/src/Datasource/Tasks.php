<?php

namespace Asdozzz\Tasks\Datasource;

class Tasks extends \Asdozzz\Universal\Datasource\Universal
{
    function GetUsersById($id)
    {
        $res = \DB::table('users AS u')
            ->join('task_user_role AS tur', 'tur.user_id', '=', 'u.id')
            ->join('task_roles AS tr', 'tur.role_id', '=', 'tr.id')
            ->where('tur.task_id', $id)->select('u.*','tr.slug as role','tr.id as role_id')->get();

        return $res;
    }
}