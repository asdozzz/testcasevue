<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tasks extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'tasks';
  	protected $essenceName = 'Tasks';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\Tasks';
  	protected $softDeletes = false;
}