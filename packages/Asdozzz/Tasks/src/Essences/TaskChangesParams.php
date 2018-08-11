<?php

namespace Asdozzz\Tasks\Essences;

use DB;

class TaskChangesParams extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName = 'Tasks';

    public $businessName   = 'Asdozzz\\Tasks\\Business\\TaskChangesParams';

    public $modelName      = 'Asdozzz\\Tasks\\Model\\TaskChangesParams';

    public $datasourceName = 'Asdozzz\\Tasks\\Datasource\\TaskChangesParams';

    public $primary_key   = 'id';
    public $table         = 'task_changes_params';
    public $label         = 'TaskChangesParams';
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
            'change_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'ИД изменения',
                    'data' => 'change_id',
                    'required' => true
                ]
            ),
            'param_code' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Код параметра',
                    'data' => 'param_code',
                    'required' => true
                ]
            ),
            'param_name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Название параметра',
                    'data' => 'param_name',
                    'required' => true
                ]
            ),
            'old_value' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Старое значение(сырое)',
                    'data' => 'old_value',
                    //'required' => true
                ]
            ),
            'new_value' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Новое значение(сырое)',
                    'data' => 'new_value',
                    'required' => true
                ]
            ),
            'old_value_text' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Старое значение',
                    'data' => 'old_value_text',
                    //'required' => true
                ]
            ),
            'new_value_text' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Новое значение',
                    'data' => 'new_value_text',
                    'required' => true
                ]
            )
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