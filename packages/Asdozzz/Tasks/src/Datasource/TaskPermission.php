<?php

namespace Asdozzz\Tasks\Datasource;

class TaskPermission extends \Asdozzz\Universal\Datasource\Universal
{
    static function getPermissionsByUserId($task_id,$id)
    {
        $res = \DB::table('task_role_permission AS pr')
            ->join('task_permissions AS p', 'pr.permission_id', '=', 'p.id')
            ->join('task_user_role AS ru', 'ru.role_id', '=', 'pr.role_id')
            ->where('ru.task_id', $task_id)
            ->where('ru.user_id', $id)->get();

        return $res;
    }
}