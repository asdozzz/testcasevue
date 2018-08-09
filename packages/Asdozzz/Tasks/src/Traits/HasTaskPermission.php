<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 29.07.2018
 * Time: 14:45
 */
namespace Asdozzz\Tasks\Traits;

trait HasTaskPermission
{
    protected $users_permissions = array();

    function hasTaskPermission($task_id,$mark)
    {
        if (empty($this->users_permissions[$this->id][$task_id]))
        {
            $permissions = \Asdozzz\Tasks\Datasource\TaskPermission::getPermissionsByUserId($task_id,$this->id);

            $this->users_permissions[$this->id][$task_id] = $permissions;
        }
        else
        {
            $permissions = $this->users_permissions[$this->id][$task_id];
        }

        return $permissions->contains('slug',$mark);
    }
}