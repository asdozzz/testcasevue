<?php

namespace Asdozzz\Projects\Essences;

use DB;

class ProjectRolePermission extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $moduleName    = 'Projects';
    public $primary_key   = 'id';
    public $table         = 'project_role_permission';
    public $label         = 'Привелегии у роли';
    public $softDeletes   = true;
    public $deleted_field = 'deleted_at';

    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            'role_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Роль',
                    'data' => 'role_id',
                    'required' => true
                ]
            ),
            'permission_id' => \Columns::factory('Integer')->extend(
                [
                    'name' => 'Привелегии',
                    'data' => 'permission_id',
                    'required' => true
                ]
            ),
        );
    }
}