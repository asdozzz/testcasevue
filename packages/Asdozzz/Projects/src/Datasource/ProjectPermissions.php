<?php

namespace Asdozzz\Projects\Datasource;

class ProjectPermissions extends \Asdozzz\Universal\Datasource\Universal
{
    static function getPermissionsByUserId($project_id,$id)
    {
        $res = \DB::table('project_role_permission AS pr')
            ->join('project_permissions AS p', 'pr.permission_id', '=', 'p.id')
            ->join('project_user_role AS ru', 'ru.role_id', '=', 'pr.role_id')
            ->where('ru.project_id', $project_id)
            ->where('ru.user_id', $id)->get();

        return $res;
    }
}