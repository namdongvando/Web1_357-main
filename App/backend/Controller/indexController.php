<?php

namespace App\backend\Controller;

use App\authentication\Controller\indexController as AuthController;
use Applications;

class indexController extends AuthController
{
    function __construct()
    {
        parent::__construct();
        $this->setLayout("Theme/admintheme/layout_admin.phtml");
    }
    public function index()
    {
        // echo "mac định";
        // self::$ControllerName;
        $data = "abc";
        $this->View($data);
    }
}
