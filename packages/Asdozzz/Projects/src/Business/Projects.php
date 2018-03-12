<?php

namespace Asdozzz\Projects\Business;

class Projects extends \Asdozzz\Universal\Business\Universal
{
    public function hasProjectPermission($project_id,$mark)
    {
        return $this->model->hasProjectPermission($project_id,$mark);
    }

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

    public function getDatatable($input)
    {
        $ProjectUser = new \Asdozzz\Projects\Model\ProjectUserRole();
        $list = $ProjectUser->getList([
            'filter' => [
                [
                    'colname' => 'user_id',
                    'operator' => '=',
                    'value' => \Request::user()->id
                ]
            ]
        ]);

        $projectIds = $list->map(function ($item) {
            return $item->project_id;
        });

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

    public function GetUsersById($id)
    {
        return $this->model->GetUsersById($id);
    }
}