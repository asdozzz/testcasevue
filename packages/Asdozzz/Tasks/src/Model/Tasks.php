<?php

namespace Asdozzz\Tasks\Model;

use \Asdozzz\Universal\Model\Universal;
use \App\Exceptions\VikaException;
/**
 * Class Tasks
 *
 * @package Asdozzz\Tasks\Model
 */
class Tasks extends Universal
{
    /**
     * @var bool
     */
    protected $softDeletes = false;
    /**
     * @var \Asdozzz\Tasks\Datasource\Tasks;
     */
    protected $datasource;

    /**
     * @param $project_id
     * @param $key
     * @return bool
     */
    function hasTaskPermission($project_id, $key)
    {
        $User = \Auth::user();

        if (empty($User))
        {
            return false;
        }

        if (!empty($this->permissions) && !empty($this->permissions[$key]))
        {
            return $User->hasTaskPermission($project_id,$this->permissions[$key]);
        }

        return true;
    }


    public function read($data)
    {
        $task = $this->datasource->read($data);

        $TaskRolesBusiness = new \Asdozzz\Tasks\Business\TaskRoles();

        $task_roles =  $TaskRolesBusiness->getArraySlug();

        $task->users = array();
        foreach ($task_roles as $name)
        {
            $task->users[$name] = array();
        }

        $users = $this->GetUsersById($task->id);

        foreach ($users as $user)
        {
            $task->users[$user->role][] = $user;
        }

        return $task;
    }

    /**
     * @param $input
     */
    public function update($input)
    {
        if (empty($input) || empty($input['data']))
        {
            throw new VikaException(\Lang::get('vika.exceptions.model.data_not_found'));
        }

        $pk = $input['data'][$this->essence->primary_key];

        if (empty($pk))
        {
            throw new VikaException(\Lang::get('vika.exceptions.model.pk_not_found'));
        }

        $need_transaction = true;

        if ($need_transaction) \DB::beginTransaction();

        try
        {
            $oldRecord = $this->read($pk);

            $record = parent::update($input);

            $TaskRolesModel = new \Asdozzz\Tasks\Model\TaskRoles();
            $TaskUserRoleModel = new \Asdozzz\Tasks\Model\TaskUserRole();

            $task_roles =  $TaskRolesModel->getAll([]);
            $TaskUserRoleModel->deleteBy([
                ['task_id',$pk]
            ]);

            foreach ($task_roles as $tr)
            {
                if (!empty($input['data']['users'][$tr->slug]))
                {
                    foreach ($input['data']['users'][$tr->slug] as $_user)
                    {
                        $item             = array(
                            'id' => null,
                            'task_id' => $pk,
                            'role_id' => $tr->id,
                            'user_id' => $_user['id']
                        );

                        $TaskUserRoleModel->create(['data' => $item]);
                    }
                }
            }

            $newRecord = $this->read($pk);

            $TaskChangesModel = new \Asdozzz\Tasks\Model\TaskChanges();
            $isset_changes = $TaskChangesModel->addChangesByCompare($oldRecord,$newRecord);

            if ($need_transaction)  \DB::commit();
        }
        catch (\Exception $e)
        {
            if ($need_transaction)  \DB::rollBack();
            throw $e;
        }

        return $newRecord;
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
