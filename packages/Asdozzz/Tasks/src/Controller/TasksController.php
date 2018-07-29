<?php

namespace Asdozzz\Tasks\Controller;

class TasksController extends \Asdozzz\Universal\Controller\UniversalController
{
    public function GetChangesById($id)
    {
        if (empty($id))
        {
            throw new \Exception(\Lang::get('request.data_not_found'));
        }

        if (!$this->business->hasTaskPermission($id,'changes'))
        {
            throw new \Exception(\Lang::get('permission.denied'));
        }

        $result = $this->business->GetChangesById($id);

        return \Response::json(['success' => true, 'result' => $result]);
    }
}