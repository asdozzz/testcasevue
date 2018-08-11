<?php

namespace Asdozzz\Tasks\Model;

use App\Exceptions\VikaException;
use Illuminate\Database\Eloquent\Model;
use DB;

class TaskChanges extends \Asdozzz\Universal\Model\Universal
{
  	protected $softDeletes = false;

    function getConverters()
    {
        return [
            'project_id' => function($val,$record)
            {
                $Model = new \Asdozzz\Projects\Model\Projects();
                $project = $Model->read($val);

                return $project->title;
            },
            'status' => function($val,$record)
            {
                $Model = new \Asdozzz\Tasks\Model\Statuses();
                $status = $Model->read($val);

                return $status->name;
            },
            'executor' => function($val,$record)
            {
                return $val;
            },
            'tracker' => function($val,$record)
            {
                $Model = new \Asdozzz\Tasks\Model\Trackers();
                $tracker = $Model->read($val);

                return $tracker->name;
            },
            'priority' => function($val,$record)
            {
                $Model = new \Asdozzz\Tasks\Model\Priorities();
                $priority = $Model->read($val);

                return $priority->name;
            },
            'subject' => function($val,$record)
            {
                return $val;
            },
            'description' => function($val,$record)
            {
                return $val;
            },
        ];
    }

    function addChangesByCompare($old,$new)
    {
        $TaskConfig = \Asdozzz\Essence\Essence::factory('Tasks');

        if (empty($TaskConfig))
        {
            throw new VikaException(\Lang::get('tasks.task_changes.model.task_config_not_found'));
        }

        /*if (count($old) != count($new))
        {
            throw new VikaException(\Lang::get('tasks.task_changes.model.diff_number_params'));
        }*/

        if ($old->{$TaskConfig->primary_key} != $new->{$TaskConfig->primary_key})
        {
            throw new VikaException(\Lang::get('tasks.task_changes.model.pk_diff'));
        }

        $task_id = $new->{$TaskConfig->primary_key};

        $changes = $this->getChanges($old, $new,$TaskConfig);

        if (!empty($changes))
        {
            $newChange = $this->create(['data' => [
                'task_id' => $task_id
            ]]);

            $ParamModel = new \Asdozzz\Tasks\Model\TaskChangesParams();

            $newParams = [];
            foreach ($changes as $item)
            {
                $item['change_id'] = $newChange->id;
                $newParams[] = $ParamModel->create(['data' => $item]);
            }
        }

        return !empty($changes);
    }


    protected function getChanges($old, $new,$TaskConfig)
    {
        $changes = [];
        $types       = $this->getConverters();
        $ignore_code = [
            'id',
            'user_id',
            'created_at',
            'updated_at',
            'deleted_at'
        ];

        $debugstr = [];

        foreach ($TaskConfig->columns as $key => $colcfg)
        {
            if (in_array($key, $ignore_code))
            {
                continue;
            }
            if (empty($types[$key]))
            {
                throw new VikaException(\Lang::get('tasks.task_changes.model.type_not_found'));
            }
            $oldVal = $old->{$key};
            $newVal = $new->{$key};
            $debugstr[] = $key.': '.$oldVal.' --- '.$newVal;
            if ($oldVal != $newVal)
            {
                $changes[] = [
                    'param_code'     => $key,
                    'param_name'     => $colcfg['name'],
                    'old_value'      => $oldVal,
                    'new_value'      => $newVal,
                    'old_value_text' => $types[$key]($oldVal, $old),
                    'new_value_text' => $types[$key]($newVal, $new),
                ];
            }
        }

        $TaskRolesBusiness = new \Asdozzz\Tasks\Business\TaskRoles();
        $task_roles =  $TaskRolesBusiness->getArraySlug();

        $UsersModel = new \Asdozzz\Users\Model\Users();

        foreach ($task_roles as $role)
        {
            $old_users = collect($old->users[$role]);
            $new_users = collect($new->users[$role]);

            $oldIds = $old_users->pluck('id')->toArray();
            $newIds = $new_users->pluck('id')->toArray();

            $res    = $this->isEqualArr($oldIds, $newIds);

            if (!$res)
            {
                $label     = $this->getLabelByCode($role);

                $oldNames = $old_users->pluck('name')->toArray();
                $newNames = $new_users->pluck('name')->toArray();

                $prefix    = 'add_';

                if (!empty($oldIds))
                {
                    $prefix  = 'update_';
                }

                $changes[] = [
                    'param_code'     => $prefix .$role,
                    'param_name'     => $label,
                    'old_value'      => join(', ',$oldIds),
                    'new_value'      => join(', ',$newIds),
                    'old_value_text' => join(', ',$oldNames),
                    'new_value_text' => join(', ',$newNames),
                ];
            }
        }

        return $changes;
    }

    public function isEqualArr($a ,$b)
    {
        asort($a);
        asort($b);

        if (count($a) != count($b))
        {
            return false;
        }

        foreach ($a as $v)
        {
            if (!in_array($v,$b))
            {
                return false;
            }
        }

        return true;
    }

    /**
     * @param $role
     * @return string
     */
    protected function getLabelByCode($role)
    {
        $label = '';
        switch ($role)
        {
            case 'author':
                $label = 'Авторы';
                break;
            case 'executor':
                $label = 'Исполнители';
                break;
            case 'QA':
                $label = 'Тестировщики';
                break;
            case 'observer':
                $label = 'Наблюдатели';
                break;
        }

        return $label;
    }
}