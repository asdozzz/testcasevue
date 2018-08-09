<?php

namespace Asdozzz\Tasks\Business;

class Tasks extends \Asdozzz\Universal\Business\Universal
{
    /**
     * @var \Asdozzz\Tasks\Model\Tasks
     */
    public $model;

    public function hasTaskPermission($project_id, $mark)
    {
        return $this->model->hasTaskPermission($project_id,$mark);
    }

    public function GetChangesById($id)
    {
        return $this->model->GetChangesById($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function GetUsersById($id)
    {
        return $this->model->GetUsersById($id);
    }

}