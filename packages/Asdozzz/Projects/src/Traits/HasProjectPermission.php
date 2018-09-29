<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 12.03.2018
 * Time: 23:19
 */
namespace Asdozzz\Projects\Traits;

trait HasProjectPermission
{
    protected $users_permissions = array();

    function hasProjectPermission($project_id,$mark)
    {
        if (empty($this->users_permissions[$this->id][$project_id]))
        {
            $permissions = \Asdozzz\Projects\Datasource\ProjectPermissions::getPermissionsByUserId($project_id,$this->id);
            $this->users_permissions[$this->id][$project_id] = $permissions;
        }
        else
        {
            $permissions = $this->users_permissions[$this->id][$project_id];
        }

        return $permissions->contains('slug',$mark);
    }
}