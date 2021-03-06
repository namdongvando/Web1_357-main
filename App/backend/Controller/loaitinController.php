<?php

namespace App\backend\Controller;

use App\IController;
use Model\Admin;
use Model\Common;
use Model\DB;
use Model\LoaiTin;
use Model\Pages\PagesForm;
use Model\Pages;
use PFBC\Element\Date;
use PFBC\Validation;
use PFBC\Validation\Required;
use PHPMailer\PHPMailer\Exception;

class loaitinController extends indexController implements IController
{

    function __construct()
    {
        parent::__construct();
        $this->setLayout("Theme/admintheme/layout_admin_ang.phtml");
    }
    public function index()
    {
        $this->View();
    }

    public function postapi()
    {
        $postInput = file_get_contents("php://input");
        $postInput = json_decode($postInput, JSON_OBJECT_AS_ARRAY);
        $Name  = $postInput["Name"];
        $Description  = $postInput["Description"];
        $Parents  = $postInput["Parents"];

        $loaiTin = new LoaiTin();
        $item["Name"] = $Name;
        $item["Description"] = $Description;
        $item["Parents"] = $Parents;
        $result =   $loaiTin->Post($item);
        var_dump($result);
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
                $page["Alias"] = Common::vn_to_str($page["Name"]);
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
            $pageForm = $_POST[PagesForm::FormName];
            $pageDb = $modelPages->GetById($pageForm["Id"]);
            // lấy thông tin file img trên form
            if (isset($_FILES[PagesForm::FormName])) {
                $files = $_FILES[PagesForm::FormName]["error"]["Images"];
            } else {
                $files = null;
            }
            foreach ($pageForm as $key => $value) {
                $pageDb[$key] = Common::InputText($value);
            }

            $pageDb["Content"] = htmlspecialchars($pageForm["Content"]);
            try {
                if ($files === 0) {
                    $fromPath = $_FILES[PagesForm::FormName]["tmp_name"]["Images"];
                    $toPath = "public/upload/" . $_FILES[PagesForm::FormName]["name"]["Images"];
                    if (is_dir("public/upload") == false) {
                        mkdir("public/upload/", 0777);
                    }
                    move_uploaded_file($fromPath, $toPath);
                    $pageDb["Images"] = "/" . $toPath;
                }
                $pageDb["Alias"] = Common::vn_to_str($pageForm["Name"]);
                $pageDb["RecUpdateDate"] = date("Y-m-d H:i:s");

                $modelPages->Put($pageDb);

                // Common::ToUrl("/backend/pages");
            } catch (Exception $th) {
                $error = $th->getMessage();
            }
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
        $modelPages = new Pages();
        $modelPages->Delete($this->getParams(0));
        Common::ToUrl("/backend/pages/");
    }

    /**
     *
     * @return mixed
     */
    function trash()
    {
    }

    public function getLoaiTin()
    {
        $params["keyword"] = $_REQUEST["keyword"] ?? "";
        $pagesIndex = $_REQUEST["pagesIndex"] ?? 1;
        $pagesNumber = $_REQUEST["pagesNumber"] ?? 10;
        $page = new LoaiTin();
        $pages = $page->GetPaging(
            $params,
            $pagesIndex,
            $pagesNumber,
            $totalRows
        );
        $a = [];
        $a["params"] = $params;
        $a["pagesIndex"] = $pagesIndex;
        $a["pagesNumber"] = $pagesNumber;
        $a["totalRows"] = $totalRows;
        $a["totalPage"] = ceil($totalRows / $pagesNumber);
        $a["data"] = [];
        if ($pages)
            while ($row =  $pages->fetch_assoc()) {
                unset($row["Content"]);
                $a["data"][] = $row;
            }

        echo json_encode($a, JSON_UNESCAPED_UNICODE);
    }
}
