<?php

namespace App\backend\Controller;

use App\IController;
use Exception;
use Model\Admin;

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
    }

    /**
     *
     * @return mixed
     */
    function trash()
    {
    }
}
