<?php

namespace Asdozzz\Tasks\Essences;

use DB;

class TaskComments extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName = 'Tasks';

    public $businessName   = 'Asdozzz\\Tasks\\Business\\TaskComments';

    public $modelName      = 'Asdozzz\\Tasks\\Model\\TaskComments';

    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\TaskComments';

    public $primary_key   = 'id';
    public $table         = 'task_comments';
    public $label         = 'TaskComments';
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
            'change_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'ИД изменения',
                    'data' => 'change_id',
                    'required' => true
                ]
            ),
            'text' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Текст комментария',
                    'data' => 'text',
                    'required' => true
                ]
            ),
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
                'columns' => $columns
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' => $columns
            ],
        ];
    }

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