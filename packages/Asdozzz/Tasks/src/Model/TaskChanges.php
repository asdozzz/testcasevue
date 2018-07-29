<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskChanges extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_changes';
  	protected $essenceName = 'TaskChanges';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\TaskChanges';
  	protected $softDeletes = false;
}