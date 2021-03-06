<?php

namespace Asdozzz\Projects\Controller;

class RequirementsController extends \Asdozzz\Universal\Controller\UniversalController
{
    function sort()
    {
        $input = \Request::all();

        if (!$this->business->hasPermission('update'))
        {
            throw new \Exception(\Lang::get($this->exceptions_crud['update']));
        }

        $result = $this->business->sort($input);

        if (empty($result))
        {
            throw new \Exception(\Lang::get('vika.exceptions.other'));
        }

        return \Response::json(['success' => true, 'result' => $result]);
    }
}