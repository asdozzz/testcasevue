<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Requirements extends \Asdozzz\Universal\Model\Universal
{
	protected $table = 'requirements';
  	protected $essenceName = 'Requirements';
  	protected $datasourceName = '\Asdozzz\Projects\Datasource\Requirements';
  	protected $softDeletes = false;
}