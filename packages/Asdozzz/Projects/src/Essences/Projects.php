<?php

namespace Asdozzz\Projects\Essences;

use DB;

class Projects extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName    = 'Projects';
    public $table         = 'projects';
    public $label         = 'Проекты';
    public $softDeletes   = true;
    public $deleted_field = 'deleted_at';

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

    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'title' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Название',
                    'data' => 'title',
                    'required' => true
                ]
            ),
            'description' => \Columns::factory('Textarea')->extend(
                [
                    'name' => 'Описание',
                    'data' => 'description',
                    'validation_rules' => 'min:3|max:5000',
                ]
            ),
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
            'created_at' => \Columns::factory('Created_at')->get(),
            'updated_at' => \Columns::factory('Updated_at')->get(),
            'deleted_at' => \Columns::factory('Deleted_at')->get(),
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
                'columns' => [
                    $columns['title'],
                    $columns['description'],
                    $columns['user_id'],
                ],
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' =>
                [
                    $columns['id'],
                    $columns['title'],
                    $columns['description'],
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
                    $columns['title'],
                    $columns['description'],
                    $columns['created_at'],
                ],
                'order' =>
                [
                    [ 'column' => 'id', 'direction' => 'desc' ]
                ]
            ]
        ];
    }

    public function getRelationships()
    {
        return [
            \Asdozzz\Essence\Relationship::factory('OneToMany',['ProjectRoles','project_id']),
            \Asdozzz\Essence\Relationship::factory('OneToMany',['ProjectUserRole','project_id']),
            \Asdozzz\Essence\Relationship::factory('OneToMany',['Requirements','project_id']),
        ];
    }
}