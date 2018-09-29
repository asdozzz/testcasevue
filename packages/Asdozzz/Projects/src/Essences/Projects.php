<?php

namespace Asdozzz\Projects\Essences;

use DB;

/**
 * Class Projects
 *
 * @package Asdozzz\Projects\Essences
 */
class Projects extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName     = 'Projects';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Projects\\Business\\Projects';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Projects\\Model\\Projects';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Projects\\Datasource\\Projects';
    /**
     * @var string
     */
    public $table         = 'projects';
    /**
     * @var string
     */
    public $label         = 'Проекты';
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
    public function getPermissions()
    {
        return array(
            'listing' => $this->table.'.listing',
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

    /**
     * @return array
     */
    public function getRelationships()
    {
        return [
            \Asdozzz\Essence\Relationship::factory('OneToMany',['ProjectRoles','project_id']),
            \Asdozzz\Essence\Relationship::factory('OneToMany',['ProjectUserRole','project_id']),
            \Asdozzz\Essence\Relationship::factory('OneToMany',['Requirements','project_id']),
        ];
    }
}