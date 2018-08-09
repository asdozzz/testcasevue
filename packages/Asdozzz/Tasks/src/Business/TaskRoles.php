<?php

namespace Asdozzz\Tasks\Business;

class TaskRoles extends \Asdozzz\Universal\Business\Universal
{
    public function getArraySlug()
    {
        return collect($this->getAll())->map(function($item){
            return $item->slug;
        });
    }
}