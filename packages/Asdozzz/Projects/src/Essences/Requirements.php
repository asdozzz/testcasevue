<?php

namespace Asdozzz\Projects\Essences;

/**
 * Class Requirements
 *
 * @package Asdozzz\Projects\Essences
 */
class Requirements extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Projects';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Projects\\Business\\Requirements';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Projects\\Model\\Requirements';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Projects\\Datasource\\Requirements';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'requirements';
    /**
     * @var string
     */
    public $label         = 'Требования';
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
            'project_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Проект',
                    'data' => 'project_id',
                    'required' => true
                ]
            ),
            'parent_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Родительское звено',
                    //'required' => true,
                    'data' => 'parent_id',
                    'default_value' => null
                ]
            ),
            'name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Название',
                    'data' => 'name',
                    'required' => true,
                    'validation_rules' => 'alpha_num',
                ]
            ),
            'description' => \Columns::factory('Textarea')->extend(
                [
                    'name' => 'Описание',
                    'data' => 'description',
                    'validation_rules' => 'alpha_num|min:3|max:5000',
                ]
            ),
            'level' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Уровень',
                    'data' => 'level',
                    'default_value' => 0
                ]
            ),
            'priority' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Приоритет',
                    'data' => 'priority',
                    'default_value' => 0
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
                            $user = \Request::user();
                            return $user->id;
                        }
                    ]
                ]
            ),
            'created_at' => \Columns::factory('Created_at')->get(),
            'updated_at' => \Columns::factory('Updated_at')->get(),
            'deleted_at' => \Columns::factory('Deleted_at')->get(),
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
                    $columns['parent_id'],
                    $columns['name'],
                    $columns['description'],
                    $columns['user_id'],
                    $columns['level'],
                    $columns['priority']
                ],
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' =>
                [
                    $columns['id'],
                    $columns['project_id'],
                    $columns['parent_id'],
                    $columns['name'],
                    $columns['description'],
                    $columns['user_id'],
                    $columns['level'],
                    $columns['priority']
                    /* Columns */
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
                    $columns['parent_id'],
                    $columns['name'],
                    $columns['description'],
                    $columns['user_id'],
                    $columns['level'],
                    $columns['priority']
                ],
                'order' =>
                    [
                        [ 'column' => 'id', 'direction' => 'desc' ]
                    ]
            ]
        ];
    }
}