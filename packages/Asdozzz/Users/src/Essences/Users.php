<?php

namespace Asdozzz\Users\Essences;

use DB;

class Users extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName    = 'Users';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Users\\Business\\Users';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Users\\Model\\Users';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Users\\Datasource\\Users';

    public $primary_key   = 'id';
    public $table         = 'users';
    public $label         = 'Пользователи';
    public $softDeletes   = true;
    public $deleted_field = 'deleted_at';

    public function getPermissions()
    {
        return array(
            'listing' => 'listing.users',
            'read'    => 'read.users',
            'create'  => 'create.users',
            'update'  => 'update.users',
            'delete'  => 'delete.users'
        );
    }

    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'remember_token' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Токен',
                    'data' => 'remember_token',
                    'system' => true,
                    'events' => 
                    [
                        'auth' => str_random(10)
                    ]
                ]
            ),
            'email' => \Columns::factory('Email')->extend(
                [
                    'name' => 'Email',
                    'data' => 'email',
                    'required' => true,
                    'validation_rules' => 'required|email|unique:users,email{pk}',
                ]
            ),
            'password' => \Columns::factory('Password')->get(),
            'name' => \Columns::factory('Text')->extend(
                [
                    'name' => 'Логин',
                    'data' => 'name',
                    'required' => true,
                    'validation_rules' => 'required|alpha_num|min:3|max:32',
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
        $forms = $this->getForms();
        return 
        [
            'default' => [
                'label'       => 'Справочник пользователей',
                'table' => $this->table,
                'primary_key' => $this->primary_key,
                'columns'     => [
                    //["targets" => -1, 'sortable' => false,"data" => null, "name" => 'Действия','defaultContent' => '','className' => 'action-control'],
                    $columns['id'],
                    $columns['name'],
                    $columns['email'],
                    $columns['created_at'],
                ],
                'order' => 
                [
                    [ 'column' => 'name', 'direction' => 'asc' ]
                ]
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
                'label'   => 'Добавление пользователя',
                'columns' => [
                    $columns['name'],
                    $columns['email'],
                    $columns['password'],
                    \Columns::factory('Password')->extend(
                        [
                            'data' => 'password_confirmation',
                            'name' => 'Повторите пароль',
                            'validation_rules' => 'required|string|same:password',
                            'nosave' => true
                        ]
                    ),
                    $columns['created_at'],
                ],
            ],
            'edit' => 
            [
                'label'   => 'Редактирование пользователя',
                'columns' =>
                [
                    $columns['id'],
                    $columns['name'],
                    $columns['email'],
                    $columns['updated_at'],
                ],
            ],
        ];
    }

    
}