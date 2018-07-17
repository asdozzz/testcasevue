<?php

namespace Asdozzz\Tasks\Essences;

/**
 * Class Statuses
 *
 * @package Asdozzz\Tasks\Essences
 */
class Statuses extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Tasks';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Tasks\\Business\\Statuses';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Tasks\\Model\\Statuses';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\Statuses';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'task_statuses';
    /**
     * @var string
     */
    public $label         = 'Статусы задач';
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
            'name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Название',
                    'data' => 'name',
                    'required' => true
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
                    $columns['name'],
                    $columns['user_id'],
                ],
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' =>
                [
                    $columns['id'],
                    $columns['name'],
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
                    $columns['name'],
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
            \Asdozzz\Essence\Relationship::factory('OneToMany',['--EssenceName--','project_id']),
        ];
    }
}