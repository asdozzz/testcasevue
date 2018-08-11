<?php

namespace Asdozzz\Tasks\Business;

/**
 * Class Tasks
 *
 * @package Asdozzz\Tasks\Business
 */
class Tasks extends \Asdozzz\Universal\Business\Universal
{
    /**
     * @var \Asdozzz\Tasks\Model\Tasks
     */
    public $model;

    /**
     * @param $project_id
     * @param $mark
     * @return bool
     */
    public function hasTaskPermission($project_id, $mark)
    {
        return $this->model->hasTaskPermission($project_id,$mark);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function GetChangesById($id)
    {
        $TaskChangesBusiness = new \Asdozzz\Tasks\Business\TaskChanges();
        return $TaskChangesBusiness->GetChangesByTaskId($id);
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