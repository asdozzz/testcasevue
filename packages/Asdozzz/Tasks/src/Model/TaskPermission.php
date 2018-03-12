<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskPermission extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_permissions';
  	protected $essenceName = 'TaskPermission';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\TaskPermission';
  	protected $softDeletes = false;
}