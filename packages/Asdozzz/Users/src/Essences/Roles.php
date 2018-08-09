<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 15.09.2016
 * Time: 9:04
 */

namespace Asdozzz\Users\Essences;

use DB;

class Roles extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName    = 'Users';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Users\\Business\\Roles';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Users\\Model\\Roles';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Users\\Datasource\\Roles';

    public $primary_key   = 'id';
    public $table         = 'roles';
    public $label         = 'Роли(Группы) пользователей';
    public $softDeletes   = false;

    public function getPermissions()
    {
        return array(
            'listing' => 'listing.roles',
            'read'    => 'read.roles',
            'create'  => 'create.roles',
            'update'  => 'update.roles',
            'delete'  => 'delete.roles'
        );
    }

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
            'level' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Уровень',
                    'data' => 'level',
                    'required' => true,
                    'default_value' => 1
                ]
            ),
            'created_at' => \Columns::factory('Created_at')->get(),
            'updated_at' => \Columns::factory('Updated_at')->get(),
        );
    }

    public function getDatatables()
    {
        $columns = $this->getColumns();
        return
            [
                'default' => [
                    'label'       => 'Справочник ролей пользователей',
                    'table' => $this->table,
                    'primary_key' => $this->primary_key,
                    'columns'     => $columns,
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
                    'label'   => 'Добавление роли пользователя',
                    'columns' => [
                        $columns['name'],
                        $columns['slug'],
                        $columns['description'],
                    ],
                ],
            'edit' =>
                [
                    'label'   => 'Редактирование роли пользователя',
                    'columns' =>
                        [
                            $columns['name'],
                            $columns['slug'],
                            $columns['description'],
                        ],
                ],
        ];
    }
}