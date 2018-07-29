<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskChangesParams extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_changes_params';
  	protected $essenceName = 'TaskChangesParams';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\TaskChangesParams';
  	protected $softDeletes = false;
}