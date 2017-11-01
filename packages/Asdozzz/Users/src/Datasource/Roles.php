<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 19.03.2017
 * Time: 15:29
 */
namespace Asdozzz\Users\Datasource;

class Roles extends \Asdozzz\Universal\Datasource\Universal
{
    static function getRolesByUserId($id)
    {
        $res = \DB::table('role_user AS ru')
            ->join('roles AS r', 'ru.role_id', '=', 'r.id')
            ->where('ru.user_id', $id)->get();
        return $res;
    }
}