<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Projects extends \Asdozzz\Universal\Model\Universal
{
  	protected $softDeletes = false;

    function hasProjectPermission($project_id,$key)
    {
        $User = \Auth::user();

        if (empty($User))
        {
            return false;
        }

        if (!empty($this->permissions) && !empty($this->permissions[$key]))
        {
            return $User->hasProjectPermission($project_id,$this->permissions[$key]);
        }

        return true;
    }

    function GetUsersById($id)
    {
        return $this->datasource->GetUsersById($id);
    }
}