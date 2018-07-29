<?php

namespace Asdozzz\Tasks\Datasource;

class Tasks extends \Asdozzz\Universal\Datasource\Universal
{
    function GetChangesById($id)
    {
        $res = \DB::table('task_changes AS tc')
            ->join('task_changes_params AS p', 'p.change_id', '=', 'tc.id')
            ->where('tc.task_id', $id)->select('tc.user,tc.,p.*')->get();

        return $res;
    }
}