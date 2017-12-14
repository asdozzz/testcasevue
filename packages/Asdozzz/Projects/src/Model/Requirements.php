<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Requirements extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'requirements';
  	protected $essenceName = 'Requirements';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\Requirements';
  	protected $softDeletes = false;

    public function sort($input)
    {
        if (empty($input) || empty($input['data']))
        {
            throw new \Exception(\Lang::get('vika.exceptions.model.data_not_found'));
        }

        $result = $this->datasource->sort($input['data']);

        return ['success' => true, 'result' => true];
    }

    public function create($input = array())
    {
    }
}