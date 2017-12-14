<?php

namespace Asdozzz\Projects\Essences;

use DB;

class ProjectUserRole extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $primary_key   = 'id';
    public $table         = 'project_user_role';
    public $label         = 'Пользователи проекта';
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