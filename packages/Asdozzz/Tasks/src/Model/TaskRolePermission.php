<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskRolePermission extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_role_permission';
  	protected $essenceName = 'TaskRolePermission';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\TaskRolePermission';
  	protected $softDeletes = false;
}