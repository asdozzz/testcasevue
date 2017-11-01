<?php

namespace Asdozzz\Users\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends \Asdozzz\Universal\Model\Universal
{
  	protected $essenceName = '\Asdozzz\Users\Essences\Users';
  	protected $datasourceName = '\Asdozzz\Users\Datasource\Users';
  	protected $softDeletes = true;
}