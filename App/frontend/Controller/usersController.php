<?php

namespace App\frontend\Controller;

use Applications;
use Model\Common;
use Model\GioHang;
use Model\SanPham;
use Model\User;
use Model\Users\UsersForm;

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
    public function taikhoan()
    {
        if (isset($_POST[UsersForm::FormName])) {
            $userForms = $_POST[UsersForm::FormName];
            $userModel = User::CurentUser();
            // $userModel["Fullname"] = $userForms["Fullname"];
            // $userModel["Email"] = $userForms["Email"];
            // $userModel["Phone"] = $userForms["Phone"];
            foreach ($userModel as $key => $value) {
                $userModel[$key] =  $userForms[$key] ?? $userModel[$key];
            }
            User::SetCurentUser($userModel);
            $userModel = new User();
            $userModel->Put(User::CurentUser());
        }

        $this->View();
    }
    public function baomat()
    {
        $this->View();
    }
    public function donhang()
    {
        $this->View();
    }
    public function logout()
    {
        User::SetCurentUser(null);
        Common::ToUrl("/users/");
    }
}
