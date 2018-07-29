<?php

namespace Asdozzz\Tasks\Business;

class Tasks extends \Asdozzz\Universal\Business\Universal
{
    public function hasTaskPermission($project_id, $mark)
    {
        return $this->model->hasTaskPermission($project_id,$mark);
    }

    public function GetChangesById($id)
    {
        return $this->model->GetChangesById($id);
    }
}