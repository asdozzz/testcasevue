<?php

namespace Asdozzz\Tasks\Business;

/**
 * Class TaskChanges
 *
 * @package Asdozzz\Tasks\Business
 */
class TaskChanges extends \Asdozzz\Universal\Business\Universal
{
    /**
     * @var \Asdozzz\Tasks\Model\TaskChanges
     */
    public $model;

    /**
     * @param $task_id
     */
    public function GetChangesByTaskId($task_id)
    {
        $input = [
            'filter' => [
                ['colname' => 'task_id','operator' => '=', 'value' => $task_id]
            ],
            'order' => [
                ['column' => 'id', 'direction' => 'asc']
            ]
        ];

        $changes = $this->model->getAll($input);

        if ($changes->isEmpty())
        {
            return [];
        }

        $changeIds = $changes->pluck('id')->toArray();

        $inputparam = [
            'filter' => [
                ['colname' => 'change_id','operator' => 'IN', 'value' => $changeIds]
            ]
        ];

        $ChangesParamsModel = new \Asdozzz\Tasks\Model\TaskChangesParams();
        $params = $ChangesParamsModel->getAll($inputparam)->groupBy('change_id')->toArray();

        $userIds = $changes->pluck('user_id')->unique()->toArray();
        $UserModel = new \Asdozzz\Users\Model\Users();

        $userparam = [
            'filter' => [
                ['colname' => 'id','operator' => 'IN', 'value' => $userIds]
            ]
        ];
        $users = $UserModel->getAll($userparam)->keyBy('id')->toArray();

        foreach ($changes as $i => $change)
        {
            $changes[$i]->params = !empty($params[$change->id])?$params[$change->id]:[];
            $changes[$i]->user = !empty($users[$change->user_id])?$users[$change->user_id]:[];
        }

        return $changes->toArray();
    }
}