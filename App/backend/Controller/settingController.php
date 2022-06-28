<?php

namespace App\backend\Controller;

use App\IController;
use Model\Common;
use Model\Setting\SettingForm;
use Model\Setting;

class settingController extends indexController implements IController
{
    /**
     */
    function __construct()
    {
        // kiểm tra đăng nhập từ lớp indexController
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
        if (isset($_POST[SettingForm::FormName])) {
            $postData = $_POST[SettingForm::FormName];
            $st = new Setting();
            $st->Post($postData);
            Common::ToUrl("/backend/setting");
        }

        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        if (isset($_POST[SettingForm::FormName])) {
            // lấy từ form
            $postData = $_POST[SettingForm::FormName];
            // láy từ database
            $st = new Setting();
            $stDB = $st->GetById($postData["Id"]);
            $stDB["Name"] = $postData["Name"];
            $stDB["Code"] = $postData["Code"];
            $stDB["Description"] = $postData["Description"];
            $st->Put($stDB);
            Common::ToUrl("/backend/setting");
        }
        $this->View(["Id" => $this->getParams(0)]);
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

    public function Mailchangepassword()
    {
        $this->View();
    }
}
