<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskComments extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_comments';
  	protected $essenceName = 'TaskComments';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\TaskComments';
  	protected $softDeletes = false;
}