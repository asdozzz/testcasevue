<?php

namespace Asdozzz\Tasks\Essences;

use DB;

class TaskChanges extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName = 'Tasks';

    public $businessName   = 'Asdozzz\\Tasks\\Business\\TaskChanges';

    public $modelName      = 'Asdozzz\\Tasks\\Model\\TaskChanges';

    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\TaskChanges';

    public $primary_key   = 'id';
    public $table         = 'task_changes';
    public $label         = 'TaskChanges';
    public $softDeletes   = false;
    public $deleted_field = 'deleted_at';

    public function getPermissions()
    {
        return array(
            'listing' => 'listing.'.$this->table,
            'read'    => 'read.'.$this->table,
            'create'  => 'create.'.$this->table,
            'update'  => 'update.'.$this->table,
            'delete'  => 'delete.'.$this->table
        );
    }

    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'user_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Автор',
                    'data' => 'user_id',
                    'default_value' => [
                        'type' => 'function',
                        'value' => function($data)
                        {
                            $User = \Auth::user();
                            return $User->id;
                        }
                    ]
                ]
            ),
            'task_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Задача',
                    'data' => 'task_id',
                    'required' => true
                ]
            ),
            'comment' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Комментарий',
                    'data' => 'comment',
                    'required' => false
                ]
            ),
            'created_at' => \Columns::factory('Created_at')->get(),
            /* Columns */
        );
    }

    public function getForms()
    {
        $columns = $this->getColumns();

        return [
            'create' =>
            [
                'label'   => 'Add',
                'columns' => $columns
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' => $columns
            ],
        ];
    }

    public function getDatatables()
    {
        $columns = $this->getColumns();

        return
        [
            'default' => [
                'label'       => $this->label,
                'table' => $this->table,
                'primary_key' => $this->primary_key,
                'columns'     => $columns,
                'order' =>
                [
                    [ 'column' => 'id', 'direction' => 'desc' ]
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    public function getRelationships()
    {
        return [
            \Asdozzz\Essence\Relationship::factory('OneToMany',['TaskChnagesParams','change_id'])
        ];
    }
}