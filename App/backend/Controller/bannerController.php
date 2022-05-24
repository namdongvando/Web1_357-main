<?php

namespace App\backend\Controller;

use App\IController;
use Model\Common;
use Model\Banner\BannerForm;
use Model\Banner;
use Model\DB;

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
            $files = $_FILES[BannerForm::FormName]["error"]["UrlImages"];
            $postData["UrlImages"] = "";
            if ($files == 0) {
                // nếu có file
                $path =  Common::UploadFile(
                    $_FILES[BannerForm::FormName],
                    "public/banner/"
                );
                $postData["UrlImages"] = $path;
            }
            // $postData = $_POST[BannerForm::FormName];
            //var_dump($postData);
            // $postData["UrlImages"] = "";
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
            foreach ($postData as $colums => $value) {
                $stDB[$colums] = $value;
            }
            // kiểm tra hình
            $files = $_FILES[BannerForm::FormName]["error"]["UrlImages"];
            if ($files == 0) {
                // nếu có file
                // xóa file cũ
                $pathDelete = substr($stDB["UrlImages"], 1);
                if (file_exists($pathDelete)) {
                    unlink($pathDelete);
                }
                $path =  Common::UploadFile(
                    $_FILES[BannerForm::FormName],
                    "public/banner/"
                );
                $stDB["UrlImages"] = $path;
            }
            // DB::$debug = true;
            $st->Put($stDB);
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
        $modelbaner = new Banner($this->getParams(0));
        // đường dẫn file cũ
        $pathDeleteFile = substr($modelbaner->UrlImages, 1);
        if (file_exists($pathDeleteFile)) {
            // thực hiện xóa 1file cũ
            unlink($pathDeleteFile);
        }
        // xóa trong database
        $modelbaner->Delete($this->getParams(0));
    }

    /**
     *
     * @return mixed
     */
    function trash()
    {
    }
}
