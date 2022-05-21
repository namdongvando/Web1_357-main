<?php

namespace App\backend\Controller;

use App\IController;
use Model\Common;
use Model\Banner\BannerForm;
use Model\Banner;

class bannerController extends indexController implements IController
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
        if (isset($_POST[BannerForm::FormName])) {
            $postData = $_POST[BannerForm::FormName];
            $st = new Banner();
            $st->Post($postData);
            Common::ToUrl("/backend/banner");
        }

        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        if (isset($_POST[BannerForm::FormName])) {
            // lấy từ form
            $postData = $_POST[BannerForm::FormName];
            // láy từ database
            $st = new Banner();
            $stDB = $st->GetById($postData["Id"]);
            $stDB["Name"] = $postData["Name"];
            $stDB["Code"] = $postData["Code"];
            $stDB["Description"] = $postData["Description"];
            $st->Put($stDB);
            Common::ToUrl("/backend/banner");
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
}
