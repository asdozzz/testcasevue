<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class Projects
 *
 * @package Asdozzz\Projects\Model
 */
class Projects extends \Asdozzz\Universal\Model\Universal
{
    /**
     * @var bool
     */
    protected $softDeletes = false;
    /**
     * @var \Asdozzz\Projects\Datasource\Projects
     */
    protected $datasource;

    /**
     * @param $project_id
     * @param $key
     * @return bool
     */
    function hasProjectPermission($project_id, $key)
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

    /**
     * @param $id
     * @return mixed
     */
    function GetUsersById($id)
    {
        return $this->datasource->GetUsersById($id);
    }
}