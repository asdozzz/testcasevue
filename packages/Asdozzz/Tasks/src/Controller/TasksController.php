<?php

namespace Asdozzz\Tasks\Controller;

class TasksController extends \Asdozzz\Universal\Controller\UniversalController
{
    /**
     * @var \Asdozzz\Tasks\Business\Tasks
     */
    protected $business;


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

    public function GetUsersById($id)
    {
        if (empty($id))
        {
            throw new \Exception(\Lang::get('request.data_not_found'));
        }

        if (!$this->business->hasTaskPermission($id,'users'))
        {
            throw new \Exception(\Lang::get('permission.denied'));
        }

        $result = $this->business->GetUsersById($id);

        return \Response::json(['success' => true, 'result' => $result]);
    }
}