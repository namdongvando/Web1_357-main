<?php

namespace App\frontend\Controller;

use Applications;
use Error;
use Exception;
use Model\Common;
use Model\GioHang;
use Model\Order;
use Model\SanPham;
use Model\User;
use Model\Users\UsersForm;
use Model\Users\UsersPassword;

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
        if (isset($_POST[UsersPassword::FormName])) {
            try {
                $formPost = $_POST[UsersPassword::FormName];
                // kiểm tra chuỗi nhập vào có hợp lệ không
                $password =
                    Common::InputText($formPost["password"]);
                $userName = User::CurentUser()["Username"];
                $modelUser = new User();
                $userDB = $modelUser->GetUserByUserPassword($userName, $password);
                // mật khẩu không đúng
                if ($userDB == null) {
                    throw new Exception("Mật khẩu không đúng");
                }
                // mật khẩu đúng
                $newpassword =
                    Common::InputText($formPost["newpassword"]);
                $repassword =
                    Common::InputText($formPost["repassword"]);
                // kiểm tra mật khẩu mới
                if ($newpassword != $repassword) {
                    throw new Exception("Mật khẩu mới không khớp");
                }
                // mật khẩu đã khớp
                // cập nhật mật khẩu vào database
                $item["Id"] = User::CurentUser()["Id"];
                // mã hóa mật khẩu
                $item["Password"] = sha1($newpassword);
                // update database
                $modelUser->Put($item);
                $er["type"] = \Model\Error::success;
                $er["content"] = "Cập nhật thành công";
                \Model\Error::set($er);
            } catch (Exception $ex) {
                $ex->getMessage();
                $er["type"] = \Model\Error::danger;
                $er["content"] = $ex->getMessage();
                \Model\Error::set($er);
            }
        }

        $this->View();
    }
    public function donhang()
    {
        $this->View();
    }
    public function donhangdetail()
    {
        $this->View();
    }
    public function donhanghuy()
    {
        $id = $this->getParams(0);
        $order  = new Order();
        $orderDetail = $order->GetById($id);
        if ($orderDetail["Status"] == Order::MoiDat) {
            $orderDetail["Status"] = Order::KhachHangHuy;
            $order->Put($orderDetail);
        }
        Common::ToUrl("/users/donhangdetail/{$id}");
    }
    public function logout()
    {
        User::SetCurentUser(null);
        Common::ToUrl("/users/");
    }
}
