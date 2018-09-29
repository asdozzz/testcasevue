<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 19.03.2017
 * Time: 15:29
 */
namespace Asdozzz\Users\Datasource;

/**
 * Class Permissions
 *
 * @package Asdozzz\Users\Datasource
 */
class Permissions extends \Asdozzz\Universal\Datasource\Universal
{
    /**
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    static function getPermissionsByUserId($id)
    {
        return \DB::table('permission_role AS pr')
            ->join('permissions AS p', 'pr.permission_id', '=', 'p.id')
            ->join('role_user AS ru', 'ru.role_id', '=', 'pr.role_id')
            ->where('ru.id', $id)->get()->pluck('slug');

    }
}