<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskRoles extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_roles';
  	protected $essenceName = 'TaskRoles';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\TaskRoles';
  	protected $softDeletes = false;
}