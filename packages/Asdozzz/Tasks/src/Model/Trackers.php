<?php

namespace Asdozzz\Tasks\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Trackers extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'task_trackers';
  	protected $essenceName = 'Trackers';
  	protected $datasourceName = '\Asdozzz\Tasks\Datasource\Trackers';
  	protected $softDeletes = false;
}