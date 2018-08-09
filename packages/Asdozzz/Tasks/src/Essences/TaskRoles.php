<?php

namespace Asdozzz\Tasks\Essences;

use DB;

/**
 * Class TaskRoles
 *
 * @package Asdozzz\Tasks\Essences
 */
class TaskRoles extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Tasks';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Tasks\\Business\\TaskRoles';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Tasks\\Model\\TaskRoles';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\TaskRoles';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'task_roles';
    /**
     * @var string
     */
    public $label         = 'Роли задачи';
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
            'name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Название',
                    'data' => 'name',
                    'required' => true,
                    'validation_rules' => 'alpha_num|min:3|max:32',
                ]
            ),
            'slug' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Метка',
                    'data' => 'slug',
                    'required' => true,
                    'validation_rules' => 'alpha_num|min:3|max:32',
                ]
            ),
            'description' => \Columns::factory('Textarea')->extend(
                [
                    'name' => 'Описание',
                    'data' => 'description',
                    'validation_rules' => 'alpha_num|min:3|max:1000',
                ]
            ),
            'created_at' => \Columns::factory('Created_at')->get(),
            'updated_at' => \Columns::factory('Updated_at')->get(),
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