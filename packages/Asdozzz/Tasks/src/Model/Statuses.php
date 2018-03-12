<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Statuses extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_statuses';
  	protected $essenceName = 'Statuses';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\Statuses';
  	protected $softDeletes = false;
}