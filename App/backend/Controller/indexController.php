<?php

namespace App\backend\Controller;

use App\authentication\Controller\indexController as AuthController;
use Applications;
use Model\DanhMuc;

class indexController extends AuthController
{
    function __construct()
    {
        parent::__construct();
        $this->setLayout("Theme/admintheme/layout_admin.phtml");
    }
    public function index()
    {
        $dm = new DanhMuc();
        $rows = 0;
        $dm->GetPaging([],1,10,$rows);
        echo $rows;
        

        // echo "mac định";
        // self::$ControllerName;
        // $data = "abc";
        // $this->View($data);
    }
}
