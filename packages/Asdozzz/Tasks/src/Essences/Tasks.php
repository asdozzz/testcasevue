<?php

namespace Asdozzz\Tasks\Essences;

use DB;

/**
 * Class Tasks
 *
 * @package Asdozzz\Tasks\Essences
 */
class Tasks extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Tasks';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Tasks\\Business\\Tasks';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Tasks\\Model\\Tasks';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\Tasks';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'tasks';
    /**
     * @var string
     */
    public $label         = 'Tasks';
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
          /*  'listing' => 'listing.'.$this->table,
            'read'    => 'read.'.$this->table,
            'create'  => 'create.'.$this->table,
            'update'  => 'update.'.$this->table,
            'delete'  => 'delete.'.$this->table*/
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
            'status' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Статус',
                    'data' => 'status',
                    'default_value' => 0,
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
            'tracker' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Трекер',
                    'data' => 'tracker',
                    'default_value' => 0,
                    'required' => true
                ]
            ),
            'priority' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Приоритет',
                    'data' => 'priority',
                    'default_value' => 0,
                    'required' => true
                ]
            ),
            'subject' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Тема',
                    'data' => 'subject',
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

        return
        [
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