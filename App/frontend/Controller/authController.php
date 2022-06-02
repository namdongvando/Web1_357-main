<?php

namespace App\frontend\Controller;

use Applications;
use Model\Common;
use Model\GioHang;
use Model\SanPham;
use Model\User;

class authController extends Applications
{
    public function __construct()
    {
        $this->setTheme("Eshopper");
        $this->setLayout("Theme/Eshopper/layout_cart.phtml");
    }
    public function index()
    {
        if (
            isset($_POST["username"])
            && isset($_POST["password"])
        ) {
            // ngă chặn các ký tự đặc biệt có thể gây mất database
            $userName = $_POST["username"];
            $userName = trim($userName);
            $userName = strip_tags($userName);
            $userName = htmlspecialchars($userName);
            $password = $_POST["password"];
            $password = trim($password);
            $password = strip_tags($password);
            $password = htmlspecialchars($password);
            $user = new User();
            // DB::$debug = true;
            $userDB = $user->GetUserByUserPassword($userName, $password);

            if ($userDB != null) {

                User::SetCurentUser($userDB);
                Common::ToUrl("/users/");
            }
        }


        $this->View();
    }
}
