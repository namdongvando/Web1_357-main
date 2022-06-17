<?php

namespace App\backend\Controller;

use App\IController;
use Model\Admin;
use Model\Common;
use Model\DB;
use Model\Pages\PagesForm;
use Model\Pages;
use PFBC\Element\Date;
use PFBC\Validation;
use PFBC\Validation\Required;
use PHPMailer\PHPMailer\Exception;

class pagesController extends indexController implements IController
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
        if (isset($_POST[PagesForm::FormName])) {
            $page = $_POST[PagesForm::FormName];
            // lấy thông tin file img trên form
            $files = $_FILES[PagesForm::FormName]["error"]["Images"];
            // có file 
            unset($page["Id"]);
            $page["Content"] = htmlspecialchars($page["Content"]);
            try {
                // mã San Phẩm, Tên sản Phẩm 
                $modelPages = new Pages();
                // $modelPages->Post($page);
                // về trang danh sách
                if ($files == 0) {
                    // var_dump($_FILES["Form_Pages"]);
                    $fromPath = $_FILES[PagesForm::FormName]["tmp_name"]["Images"];
                    $toPath = "public/upload/" . $_FILES[PagesForm::FormName]["name"]["Images"];
                    if (is_dir("public/upload") == false) {
                        mkdir("public/upload/", 0777);
                    }
                    move_uploaded_file($fromPath, $toPath);
                    $page["Images"] = "/" . $toPath;
                }
                $page["Alias"] = $page["Name"];
                $page["RecCreateDate"] = date("Y-m-d H:i:s");
                $page["RecUpdateDate"] = date("Y-m-d H:i:s");
                $page["User"] = Admin::CurentUser()["Id"];
                // DB::$debug = true;
                $modelPages->Post($page);
                // var_dump($page);
                Common::ToUrl("/backend/pages");
            } catch (Exception $th) {
                $error = $th->getMessage();
            }
        }
        $this->View();
    }

    /**s
     *
     * @return mixed
     */
    function put()
    {
        $modelPages = new Pages();
        if (isset($_POST[PagesForm::FormName])) {
            $page = $_POST[PagesForm::FormName];
            // lấy thông tin file img trên form
            $files = $_FILES["Form_Pages"]["error"]["UrlImages"];
            // có file 
            // unset($page["Id"]);
            $pageDB = $modelPages->GetById($page["Id"]);

            $page["Price"] = floatval($page["Price"]);
            $page["SalePrice"] = floatval($page["SalePrice"]);
            $page["Content"] = htmlspecialchars($page["Content"]);
            try {
                // không có trong database
                if ($pageDB == null) {
                    throw new Exception("Không có sản phẩm muốn sửa");
                }
                $required = new Validation\Required("Bạn Chưa Nhập Mã Sản Phẩm");
                if ($required->isValid($page["Code"]) == false) {
                    throw new Exception($required->getMessage);
                }
                $required = new Validation\Required("Bạn Chưa Nhập Tên Sản Phẩm");
                if ($required->isValid($page["Name"]) == false) {
                    throw new Exception($required->getMessage);
                }
                // mã San Phẩm, Tên sản Phẩm
                // $modelPages = new Pages();
                // $modelPages->Post($page);
                // về trang danh sách

                if ($files == 0) {
                    // var_dump($_FILES["Form_Pages"]);
                    $fromPath = $_FILES["Form_Pages"]["tmp_name"]["UrlImages"];
                    $toPath = "public/upload/" . $_FILES["Form_Pages"]["name"]["UrlImages"];
                    if (is_dir("public/upload") == false) {
                        mkdir("public/upload/", 0777);
                    }
                    move_uploaded_file($fromPath, $toPath);
                    $page["UrlImages"] = "/" . $toPath;
                }
                $pageDB["Code"] = $page["Code"];
                $pageDB["IdDM"] = $page["IdDM"];
                $pageDB["Name"] = $page["Name"];
                $pageDB["Decription"] = $page["Decription"];
                $pageDB["Price"] = $page["Price"];
                $pageDB["Keyword"] = $page["Keyword"];
                $pageDB["Title"] = $page["Title"];
                $pageDB["Content"] = $page["Content"];
                $pageDB["UrlImages"] = $page["UrlImages"]
                    ?? $pageDB["UrlImages"];
                $pageDB["SalePrice"] = $page["SalePrice"];
                $pageDB["Active"] = $page["Active"];
                $modelPages->Put($pageDB);
                // Common::ToUrl("/backend/sanpham");
            } catch (Exception $th) {
                $error = $th->getMessage();
            }
            //  var_dump($page);
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
