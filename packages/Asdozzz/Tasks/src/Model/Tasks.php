<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tasks extends \Asdozzz\Universal\Model\Universal
{
	protected $softDeletes = false;

    function hasTaskPermission($project_id, $key)
    {
        $User = \Auth::user();

        if (empty($User))
        {
            return false;
        }

        if (!empty($this->permissions) && !empty($this->permissions[$key]))
        {
            return $User->hasTaskPermission($project_id,$this->permissions[$key]);
        }

        return true;
    }

    function GetChangesById($id)
    {
        return $this->datasource->GetChangesById($id);
    }
}
