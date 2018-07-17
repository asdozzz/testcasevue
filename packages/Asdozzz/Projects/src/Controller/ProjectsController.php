<?php

namespace Asdozzz\Projects\Controller;

/**
 * Class ProjectsController
 *
 * @package Asdozzz\Projects\Controller
 */
class ProjectsController extends \Asdozzz\Universal\Controller\UniversalController
{
    /**
     * @var \Asdozzz\Projects\Business\Projects
     */
    protected $business;

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function GetUsersById($id)
    {
        if (empty($id))
        {
            throw new \Exception(\Lang::get('request.data_not_found'));
        }

        if (!$this->business->hasProjectPermission($id,'users'))
        {
            throw new \Exception(\Lang::get('permission.denied'));
        }

        $result = $this->business->GetUsersById($id);

        return \Response::json(['success' => true, 'result' => $result]);
    }
}