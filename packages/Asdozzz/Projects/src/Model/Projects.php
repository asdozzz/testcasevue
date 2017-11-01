<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Projects extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'projects';
  	protected $essenceName = 'Projects';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\Projects';
  	protected $softDeletes = false;
}