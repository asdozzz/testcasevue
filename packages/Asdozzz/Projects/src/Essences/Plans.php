<?php

namespace Asdozzz\Projects\Essences;

use DB;

class Plans extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName    = 'Projects';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Projects\\Business\\Plans';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Projects\\Model\\Plans';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Projects\\Datasource\\Plans';
    public $primary_key   = 'id';
    public $table         = 'plans';
    public $label         = 'Plans';
    public $softDeletes   = true;
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
                    /* Columns */
                ],
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' =>
                [
                    $columns['id'],
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
                'columns'     => $columns,
                'order' =>
                    [
                        [ 'column' => 'id', 'direction' => 'desc' ]
                    ]
            ]
        ];
    }
}