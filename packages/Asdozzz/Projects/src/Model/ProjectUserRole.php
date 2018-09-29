<?php

namespace Asdozzz\Projects\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectUserRole extends \Asdozzz\Universal\Model\Universal
{
    const AUTHOR = 1;
    const EXECUTOR = 2;
    const QA = 3;
    const OBSERVER = 4;
}