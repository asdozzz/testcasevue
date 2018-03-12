<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectPermissions extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'project_permissions';
  	protected $essenceName = 'ProjectPermissions';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\ProjectPermissions';
  	protected $softDeletes = false;
}