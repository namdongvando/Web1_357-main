<?php 
namespace App\authentication\Controller;

use Applications;
use Model\Admin;

class indexController extends Applications
{
    public function __construct()
    {
        // hàm khởi tạo
        // kiểm tra login
        if(isset($_SESSION["Quantri"])==false){
            // chưa đăng nhập
            // chuyển qua trang login
            header("Location: /authentication/login/index");
            exit();
        }

        $this->setLayout("Theme/admintheme/layout_admin.phtml");
    } 
    // action index
    public function index()
    { 
           // echo "đã đăng nhập";
        if(isset($_POST["user"])) {
            // đã bấm vào  nut luu
            //var_dump($_POST);
            // 
            $u = $_POST["user"];
            
            $admin = new Admin();
            // thông tin tài khoản dang đăng nhập
            $user = Admin::CurentUser();
            //var_dump($user);
            $user["Fullname"] = $u["HoTen"]; 
            $user["Phone"] = $u["SDT"]; 
            $user["Email"] = $u["Email"]; 
            $user["Address"] = $u["DiaChi"]; 
            $user["Province"] = $u["Tinh"]; 
            $user["District"] = $u["Huyen"]; 
            $user["Ward"] = $u["Xa"]; 

            $admin->UpdateUser($user);

            Admin::SetCurentUser($user);


        }
           

            $this->View();
    }
    public function logout()
    { 
        unset($_SESSION["Quantri"]);    
        header("Location: /authentication/");
        exit();
    }
}


?>