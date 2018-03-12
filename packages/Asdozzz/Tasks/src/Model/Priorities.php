<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Priorities extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_priorities';
  	protected $essenceName = 'Priorities';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\Priorities';
  	protected $softDeletes = false;
}