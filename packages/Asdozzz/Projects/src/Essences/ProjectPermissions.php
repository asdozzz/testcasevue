<?php

namespace Asdozzz\Projects\Essences;

use DB;

/**
 * Class ProjectPermissions
 *
 * @package Asdozzz\Projects\Essences
 */
class ProjectPermissions extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Projects';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Projects\\Business\\ProjectPermissions';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Projects\\Model\\ProjectPermissions';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Projects\\Datasource\\ProjectPermissions';
    /**
     * @var string
     */
    public $primary_key   = 'id';
    /**
     * @var string
     */
    public $table         = 'project_permissions';
    /**
     * @var string
     */
    public $label         = 'Привелегии';
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
            'created_at' => \Columns::factory('Created_at')->get(),
            'updated_at' => \Columns::factory('Updated_at')->get(),
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
                        $columns['name'],
                        $columns['slug'],
                    ],
                ],
            'edit' =>
                [
                    'label'   => 'Edit',
                    'columns' =>
                        [
                            $columns['id'],
                            $columns['name'],
                            $columns['slug'],
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
                'columns'     => $columns,
                'order' =>
                    [
                        [ 'column' => 'id', 'direction' => 'desc' ]
                    ]
            ]
        ];
    }

}