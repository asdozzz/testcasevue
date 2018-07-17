<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 15.09.2016
 * Time: 9:04
 */

namespace Asdozzz\Projects\Essences;

use DB;

/**
 * Class ProjectRoles
 *
 * @package Asdozzz\Projects\Essences
 */
class ProjectRoles extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    /**
     * @var string
     */
    public $moduleName = 'Projects';
    /**
     * @var string
     */
    public $businessName   = 'Asdozzz\\Projects\\Business\\ProjectRoles';
    /**
     * @var string
     */
    public $modelName      = 'Asdozzz\\Projects\\Model\\ProjectRoles';
    /**
     * @var string
     */
    public $datasourceName = 'Asdozzz\\Projects\\Datasource\\ProjectRoles';
    /**
     * @var string
     */
    public $primary_key = 'id';
    /**
     * @var string
     */
    public $table       = 'project_roles';
    /**
     * @var string
     */
    public $label       = 'Роли(Группы) проектов';
    /**
     * @var bool
     */
    public $softDeletes = false;

    /**
     * @return array
     */
    public function getPermissions()
    {
        return array(
            'listing' => 'listing.project_roles',
            'read'    => 'read.project_roles',
            'create'  => 'create.project_roles',
            'update'  => 'update.project_roles',
            'delete'  => 'delete.project_roles'
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

    /**
     * @return array
     */
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

    /**
     * @return array
     */
    public function getForms()
    {
        $columns = $this->getColumns();

        return [
            'create' =>
                [
                    'label'   => 'Добавление роли для проекта',
                    'columns' => [
                        $columns['name'],
                        $columns['slug'],
                        $columns['description'],
                    ],
                ],
            'edit' =>
                [
                    'label'   => 'Редактирование роли для проекта',
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