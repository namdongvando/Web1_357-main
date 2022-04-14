<?php

namespace App\backend\Controller;
 
use Applications;

class indexController extends Applications
{
    function __construct()
    {
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
