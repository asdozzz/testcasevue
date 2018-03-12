<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectRolePermission extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'project_role_permission';
  	protected $essenceName = 'ProjectRolePermission';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\ProjectRolePermission';
  	protected $softDeletes = false;
}