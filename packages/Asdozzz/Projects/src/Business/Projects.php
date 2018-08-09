<?php

namespace Asdozzz\Projects\Business;

/**
 * Class Projects
 *
 * @package Asdozzz\Projects\Business
 */
class Projects extends \Asdozzz\Universal\Business\Universal
{
    /**
     * @var \Asdozzz\Projects\Model\Projects
     */
    public $model;

    /**
     * @param $project_id
     * @param $mark
     * @return mixed
     */
    public function hasProjectPermission($project_id, $mark)
    {
        return $this->model->hasProjectPermission($project_id,$mark);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $result = $this->model->create($data);

        $ProjectUser = new \Asdozzz\Projects\Model\ProjectUserRole();
        $ProjectUser->create([
            'data' => [
                'project_id' => $result['result']->id,
                'user_id' => $result['result']->user_id,
                'role_id' => $ProjectUser::AUTHOR
            ]
        ]);

        return $result;
    }

    /**
     * @param $input
     * @return array
     */
    public function getDatatable($input)
    {
        $projectIds = $this->getAvailableProjects();

        if (empty($projectIds))
        {
            return [
                'recordsTotal' => 0,
                "recordsFiltered" =>  0,
                'data' => []
            ];
        }
        $input['filter'][] = [
            'colname' => 'id',
            'operator' => 'in',
            'value' => $projectIds
        ];

        return $this->model->getDatatable($input);
    }

    public function getAll($input = array())
    {
        $projectIds = $this->getAvailableProjects();

        if (empty($projectIds))
        {
            return [];
        }

        $input['filter'][] = [
            'colname' => 'id',
            'operator' => 'in',
            'value' => $projectIds
        ];

        return $this->model->getAll($input);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function GetUsersById($id)
    {
        return $this->model->GetUsersById($id);
    }

    /**
     * @return mixed
     */
    protected function getAvailableProjects()
    {
        $ProjectUser = new \Asdozzz\Projects\Model\ProjectUserRole();
        $list        = $ProjectUser->getList([
            'filter' => [
                [
                    'colname'  => 'user_id',
                    'operator' => '=',
                    'value'    => \Request::user()->id
                ]
            ]
        ]);
        $projectIds = $list->map(function ($item)
        {
            return $item->project_id;
        });

        return $projectIds;
    }
}