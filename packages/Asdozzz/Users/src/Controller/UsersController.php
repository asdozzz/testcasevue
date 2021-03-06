<?php

namespace Asdozzz\Users\Controller;

class UsersController extends \Asdozzz\Universal\Controller\UniversalController
{
    protected $roles_business;

    public function __construct()
    {
        parent::__construct();
        $this->roles_business = new \Asdozzz\Users\Business\Roles();
    }

    public function anyRolesList()
    {
        $input = \Request::all();

        $result = $this->roles_business->getList();

        if (empty($result))
        {
            throw new \Exception(\Lang::get('vika.exceptions.other'));
        }

        return \Response::json($result);
    }
}