<?php

namespace Asdozzz\Tasks\Essences;

use DB;

/**
 * Class TaskRolePermission
 *
 * @package Asdozzz\Tasks\Essences
 */
class TaskRolePermission extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Tasks';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Tasks\\Business\\TaskRolePermission';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Tasks\\Model\\TaskRolePermission';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\TaskRolePermission';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'task_role_permission';
    /**
     * @var string
     */
    public $label         = 'Привелегии у роли';
    /**
     * @var bool
     */
    public $softDeletes   = true;
    /**
     * @var string
     */
    public $deleted_field = 'deleted_at';

    /**
     * @return array
     */
    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'role_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Роль',
                    'data' => 'role_id',
                    'required' => true
                ]
            ),
            'permission_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Привелегии',
                    'data' => 'permission_id',
                    'required' => true
                ]
            ),
        );
    }


    /**
     * @return array
     */
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
                    'columns' => $columns
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
}