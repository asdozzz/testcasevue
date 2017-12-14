<?php

namespace Asdozzz\Projects\Business;

class Requirements extends \Asdozzz\Universal\Business\Universal
{
	public $modelName = '\Asdozzz\Projects\Model\Requirements';

    public function getDatatable($input)
    {
        $input['start'] = 0;
        $input['length'] = 10000;
        return $this->model->getDatatable($input);
    }

    public function sort($input)
    {
        return $this->model->sort($input);
    }
}