<?php

namespace Asdozzz\Projects\Essences;

use DB;

/**
 * Class ProjectUserRole
 *
 * @package Asdozzz\Projects\Essences
 */
class ProjectUserRole extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Projects';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Projects\\Business\\ProjectUserRole';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Projects\\Model\\ProjectUserRole';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Projects\\Datasource\\ProjectUserRole';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'project_user_role';
    /**
     * @var string
     */
    public $label         = 'Пользователи проекта';
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
    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'project_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Проект',
                    'data' => 'project_id',
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
                    $columns['project_id'],
                    $columns['role_id'],
                    $columns['user_id'],
                ],
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' =>
                [
                    $columns['id'],
                    $columns['project_id'],
                    $columns['role_id'],
                    $columns['user_id'],
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
                    $columns['project_id'],
                    $columns['role_id'],
                    $columns['user_id'],
                ],
                'order' =>
                    [
                        [ 'column' => 'id', 'direction' => 'desc' ]
                    ]
            ]
        ];
    }
}