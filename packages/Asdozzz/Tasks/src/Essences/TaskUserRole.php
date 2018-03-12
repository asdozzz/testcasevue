<?php

namespace Asdozzz\Tasks\Essences;

use DB;

class TaskUserRole extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName    = 'Tasks';
    public $primary_key   = 'id';
    public $table         = 'task_user_role';
    public $label         = 'Пользователи задачи';
    public $softDeletes   = false;
    public $deleted_field = 'deleted_at';

    public function getPermissions()
    {
        return array(
            //'listing' => 'listing.'.$this->table,
            //'read'    => 'read.'.$this->table,
            //'create'  => 'create.'.$this->table,
            //'update'  => 'update.'.$this->table,
            //'delete'  => 'delete.'.$this->table
        );
    }

    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'task_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Задача',
                    'data' => 'task_id',
                    'required' => true
                ]
            ),
            'role_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Роль',
                    'data' => 'role_id',
                    'required' => true
                ]
            ),
            'user_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Пользователь',
                    'data' => 'user_id',
                    'required' => true
                ]
            ),
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
                'columns' => $columns,
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' => $columns,
            ],
        ];
    }

    public function getDatatables()
    {
        $columns = $this->getColumns();

        return [
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

    public function getRelationships()
    {
        return [];
    }
}