<?php

namespace Asdozzz\Users\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends \Asdozzz\Universal\Model\Universal
{
  	protected $softDeletes = true;

    function getByIds($ids)
    {
        $filter = [
            ['id','in',$ids]
        ];

        $res = $this->datasource->getByArray($filter);

        return $res;
    }
}