<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 19.03.2017
 * Time: 15:28
 */
namespace Asdozzz\Users\Model;

class Roles extends \Asdozzz\Universal\Model\Universal
{
    protected $essenceName = '\Asdozzz\Users\Essences\Roles';
    protected $datasourceName = '\Asdozzz\Users\Datasource\Roles';
    protected $softDeletes = true;
}