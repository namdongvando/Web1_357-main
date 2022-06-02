<?php

namespace App\frontend\Controller;

use Applications;
use Model\Common;
use Model\GioHang;
use Model\SanPham;
use Model\User;

class usersController extends Applications
{
    public function __construct()
    {
        if (User::CurentUser() == null) {
            Common::ToUrl("/auth/index");
        }
        $this->setTheme("Eshopper");
        $this->setLayout("Theme/Eshopper/layout_users.phtml");
    }
    public function index()
    {
        $this->View();
    }
}
