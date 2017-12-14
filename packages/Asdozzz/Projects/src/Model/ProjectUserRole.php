<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectUserRole extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'project_user';
  	protected $essenceName = 'ProjectUserRole';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\ProjectUserRole';
  	protected $softDeletes = false;
}