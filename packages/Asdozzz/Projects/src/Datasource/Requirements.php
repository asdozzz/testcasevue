<?php

namespace Asdozzz\Projects\Datasource;

class Requirements extends \Asdozzz\Universal\Datasource\Universal
{
    public function sort($adjacents)
    {
        for ($i=0;$i<count($adjacents);$i++)
        {
            $this->update($adjacents[$i]['id'],['priority' => $adjacents[$i]['priority'], 'parent_id' => $adjacents[$i]['parent_id']]);
        }

        return true;
    }
}