<?php

namespace Asdozzz\Tasks\Essences;

use DB;

/**
 * Class TaskUserRole
 *
 * @package Asdozzz\Tasks\Essences
 */
class TaskUserRole extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Tasks';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Tasks\\Business\\TaskUserRole';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Tasks\\Model\\TaskUserRole';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\TaskUserRole';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'task_user_role';
    /**
     * @var string
     */
    public $label         = 'Пользователи задачи';
    /**
     * @var bool
     */
    public $softDeletes   = false;
    /**
     * @var string
     */
    public $deleted_field = 'deleted_at';

    /**
     * @return array
     */
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

    /**
     * @return array
     */
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

    /**
     * @return array
     */
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

    /**
     * @return array
     */
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

    /**
     * @return array
     */
    public function getRelationships()
    {
        return [];
    }
}