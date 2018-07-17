<?php

namespace Asdozzz\Projects\Essences;


/**
 * Class ProjectRolePermission
 *
 * @package Asdozzz\Projects\Essences
 */
class ProjectRolePermission extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Projects';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Projects\\Business\\ProjectRolePermission';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Projects\\Model\\ProjectRolePermission';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Projects\\Datasource\\ProjectRolePermission';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'project_role_permission';
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
            //'listing' => 'listing.'.$this->table,
            'view'    => $this->table.'.view',
            'read'    => $this->table.'.read',
            'create'  => $this->table.'.create',
            'update'  => $this->table.'.edit',
            'delete'  => $this->table.'.remove',
            'users'   => $this->table.'.users',
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
                    'columns' => [
                        $columns['role_id'],
                        $columns['permission_id'],
                    ],
                ],
            'edit' =>
                [
                    'label'   => 'Edit',
                    'columns' =>
                        [
                            $columns['id'],
                            $columns['role_id'],
                            $columns['permission_id'],
                        ],
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
                'columns'     => [
                    $columns['id'],
                    $columns['role_id'],
                    $columns['permission_id'],
                ],
                'order' =>
                    [
                        [ 'column' => 'id', 'direction' => 'desc' ]
                    ]
            ]
        ];
    }
}