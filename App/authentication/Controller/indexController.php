<?php 
namespace App\authentication\Controller;

use Applications;

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