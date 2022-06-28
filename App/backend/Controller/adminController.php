<?php

namespace App\backend\Controller;

use App\IController;
use Exception;
use Model\Admin;
use Model\Common;
use Model\Mail\PhpMail;

class adminController extends indexController implements IController
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->View();
    }
    /**
     *
     * @return mixed
     */
    function post()
    {
        if (isset($_POST["btnLuu"])) {
            try {
                $admin = [];
                $adminPost = $_POST["user"];
                $admin["Fullname"] = $adminPost["HoTen"];
                $admin["Phone"] = $adminPost["SDT"];
                $admin["Email"] = $adminPost["Email"];
                $admin["Username"] = $adminPost["TaiKhoan"];
                $admin["Password"] = $adminPost["MatKhau"];
                $admin["Address"] = $adminPost["DiaChi"];
                $admin["Province"] = $adminPost["Tinh"];
                $admin["District"] = $adminPost["Huyen"];
                $admin["Ward"] = $adminPost["Xa"];
                $ModelAdmin = new Admin();
                $ModelAdmin->Post($admin);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        $ModelAdmin = new Admin();
        // sửa khi bấm nút lưu
        if (isset($_POST["btnLuu"])) {
            try {
                $admin = [];
                $adminPost = $_POST["user"];
                // lấy thông tin của admin trong database
                $admin = $ModelAdmin->GetById($adminPost["Id"]);
                // cập nhật thông tin theo Form
                $admin["Fullname"] = $adminPost["HoTen"];
                $admin["Phone"] = $adminPost["SDT"];
                $admin["Email"] = $adminPost["Email"];
                $admin["Address"] = $adminPost["DiaChi"];
                $admin["Province"] = $adminPost["Tinh"];
                $admin["District"] = $adminPost["Huyen"];
                $admin["Ward"] = $adminPost["Xa"];
                $ModelAdmin->Put($admin);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        // lấy id từ đường dẫn
        $id = $this->getParams(0);
        // chuyển id qua View
        $this->View(["Id" => $id]);
    }
    function resetpassword()
    {
        $ModelAdmin = new Admin();
        // sửa khi bấm nút lưu
        if (isset($_POST["btnLuu"])) {
            $user = $_POST["user"];
            $id = $user["Id"];
            $admin = new Admin($id);
            $newPassword = $user["NewPassword"];
            $ModelAdmin->ResetPassword($id, $newPassword);
            $Subject = "Thông báo đổi mật khẩu";
            $file = "public\Maincontent\Mainchangepassword.html";
            $content = file_get_contents($file);
            $content = str_replace("[Password]", $newPassword, $content);
            $content = str_replace("[Fullname]", $admin->Fullname, $content);
            $Body = $content;
            $AltBody = "Thông báo đổi mật khẩu";
            $MailTo = [$admin->Email];
            PhpMail::SendMailHttp($Subject, $Body, $AltBody, $MailTo);
        }
        // lấy id từ đường dẫn
        $id = $this->getParams(0);
        // chuyển id qua View
        $this->View(["Id" => $id]);
    }

    /**
     *
     * @return mixed
     */
    function detail()
    {
    }

    /**
     *
     * @return mixed
     */
    function delete()
    {
        $id = $this->getParams(0);
        $admin = new Admin();
        $admin->Delete($id);
        Common::ToUrl("/backend/admin/");
    }

    /**
     *
     * @return mixed
     */
    function trash()
    {
    }
}
