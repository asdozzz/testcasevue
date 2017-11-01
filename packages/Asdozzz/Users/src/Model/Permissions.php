<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 19.03.2017
 * Time: 15:28
 */
namespace Asdozzz\Users\Model;

class Permissions extends \Asdozzz\Universal\Model\Universal
{
    protected $table = 'permissions';
    protected $essenceName = '\Asdozzz\Users\Essences\Permissions';
    protected $datasourceName = '\Asdozzz\Users\Datasource\Permissions';
    protected $softDeletes = true;
}