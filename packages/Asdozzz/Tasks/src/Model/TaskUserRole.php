<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskUserRole extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_user_role';
  	protected $essenceName = 'TaskUserRole';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\TaskUserRole';
  	protected $softDeletes = false;
}