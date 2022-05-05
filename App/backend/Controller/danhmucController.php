<?php

namespace App\backend\Controller;

use App\IController;
use Model\DanhMuc;
use PHPMailer\PHPMailer\Exception;

class danhmucController extends indexController implements IController
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->View();
        // echo "danhmuc>index";
    }
    /**
     */


    /**
     *
     * @return mixed
     */
    function post()
    {
        if (isset($_POST["Name"])) { // đã bấm nút thêm
            $item["Name"] = $_POST["Name"];
            $item["Decription"] = $_POST["Decription"];
            $item["IsDelete"] = isset($_POST["IsDelete"]) ? 1 : 0;
            $dm = new DanhMuc();
            $dm->Post($item);
            header("Location: /backend/danhmuc/");
        }

        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        $dm = new DanhMuc();
        try {
            // bam nut sua
            if (isset($_POST["Id"])) {
                $item["Id"] = $_POST["Id"];
                $item["Name"] = $_POST["Name"];
                $item["Decription"] = $_POST["Decription"];
                $item["IsDelete"] = isset($_POST["IsDelete"]) ? 1 : 0;
                $dm->Put($item);
            }
        } catch (Exception $ex) {
        }

        $id = $this->getParams(0);
        // echo $id;
        $dmArray = $dm->GetById($id);
        // var_dump($dmArray);
        $this->View(["DanhMuc" => $dmArray]);
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
    function trash()
    {
    }
    /**
     *
     * @return mixed
     */
    function delete()
    {
        $id = $this->getParams(0);
        $dm = new DanhMuc();
        $dm->Delete($id);
        header("Location: /backend/danhmuc/");
    }
}
