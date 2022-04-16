<?php 
namespace App\authentication\Controller;

use Applications;
use Model\Admin;

class loginController extends Applications 
{
    function __construct()
    {
        // đã đăng nhập thì chuyển qua trang đã đăng nhập
        if(isset($_SESSION["Quantri"])){
            header("Location: /authentication/index/index");
            exit();
        }        
    }
    public function index()
    { 
        if(isset($_POST["btnDangNhap"])){
            // đã gửi thông tin đăng nhập
            $user = $_POST["user"];
           $username = $user["username"];
           $password =  $user["password"];
           $admin = new Admin();
           $userDb = 
            $admin->getUserByPassword($username,$password);
            // var_dump($userDb);
            if($userDb){
                $_SESSION["Quantri"] = $userDb;
                header("Location: /authentication/");
                exit();
            }
        }

        $this->View();
    }
}
