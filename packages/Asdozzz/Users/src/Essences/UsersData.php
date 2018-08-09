<?php

namespace Asdozzz\Users\Essences;

use DB;

class UsersData extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName    = 'Users';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Users\\Business\\UsersData';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Users\\Model\\UsersData';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Users\\Datasource\\UsersData';

    public $primary_key   = 'id';
    public $table         = 'users_data';
    public $label         = 'Доп. данные пользователей';
    public $softDeletes   = true;
    public $deleted_field = 'deleted_at';

    public function getPermissions()
    {
        return array(
            'listing' => 'listing.users_data',
            'read'    => 'read.users_data',
            'create'  => 'create.users_data',
            'update'  => 'update.users_data',
            'delete'  => 'delete.users_data'
        );
    }

    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'first_name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Имя',
                    'data' => 'first_name',
                    'validation_rules' => 'alpha_num|min:3|max:32',
                ]
            ),
            'last_name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Фамилия',
                    'data' => 'last_name',
                    'validation_rules' => 'alpha_num|min:3|max:32',
                ]
            ),
            'middle_name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Отчество',
                    'data' => 'middle_name',
                    'validation_rules' => 'alpha_num|min:3|max:32',
                ]
            ),
            'created_at' => \Columns::factory('Created_at')->get(),
            'updated_at' => \Columns::factory('Updated_at')->get(),
            'deleted_at' => \Columns::factory('Deleted_at')->get(),
        );
    }

    public function getDatatables()
    {
        $columns = $this->getColumns();
        return 
        [
            'default' => [
                'label'       => 'Справочник доп.данных пользователей',
                'table' => $this->table,
                'primary_key' => $this->primary_key,
                'columns'     => [
                    ["targets" => -1, 'sortable' => false,"data" => null, "name" => 'Действия','defaultContent' => '','className' => 'action-control'],
                    $columns['id'],
                    $columns['last_name'],
                    $columns['first_name'],
                    $columns['middle_name'],
                    $columns['created_at'],
                ],
                'order' => 
                [
                    [ 'column' => 'id', 'direction' => 'desc' ]
                ],
                'forms' => $this->getForms()
            ]
        ];
    }

    public function getForms()
    {
        $columns = $this->getColumns();

        $create_columns = [];

        return [
            'create' => 
            [
                'label'   => 'Добавление данных пользователя',
                'columns' => [
                    $columns['last_name'],
                    $columns['first_name'],
                    $columns['middle_name'],
                    $columns['created_at'],
                ],
            ],
            'edit' => 
            [
                'label'   => 'Редактирование данных пользователя',
                'columns' => 
                [
                    $columns['last_name'],
                    $columns['first_name'],
                    $columns['middle_name'],
                    $columns['updated_at'],
                ],
            ],
        ];
    }
}