<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectRoles extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'project_roles';
  	protected $essenceName = 'ProjectRoles';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\ProjectRoles';
  	protected $softDeletes = false;
}