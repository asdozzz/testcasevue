<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectUser extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'project_user';
  	protected $essenceName = 'ProjectUser';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\ProjectUser';
  	protected $softDeletes = false;
}