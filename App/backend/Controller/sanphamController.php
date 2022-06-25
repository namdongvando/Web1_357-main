<?php

namespace App\backend\Controller;

use App\IController;
use Model\Common;
use Model\SanPham;
use Model\SanPhamForm;
use PFBC\Validation;
use PFBC\Validation\Required;
use PHPMailer\PHPMailer\Exception;
use Model\ExcelConfig;

class sanphamController extends indexController implements IController
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
        if (isset($_POST[SanPhamForm::FormName])) {
            $sanPham = $_POST[SanPhamForm::FormName];
            // lấy thông tin file img trên form
            $files = $_FILES["Form_SanPham"]["error"]["UrlImages"];
            // có file


            unset($sanPham["Id"]);
            $sanPham["Price"] = floatval($sanPham["Price"]);
            $sanPham["SalePrice"] = floatval($sanPham["SalePrice"]);
            $sanPham["Content"] = htmlspecialchars($sanPham["Content"]);
            try {
                $required = new Validation\Required("Bạn Chưa Nhập Mã Sản Phẩm");
                if ($required->isValid($sanPham["Code"]) == false) {
                    throw new Exception($required->getMessage);
                }
                $required = new Validation\Required("Bạn Chưa Nhập Tên Sản Phẩm");
                if ($required->isValid($sanPham["Name"]) == false) {
                    throw new Exception($required->getMessage);
                }
                // mã San Phẩm, Tên sản Phẩm
                $modelSanPham = new SanPham();
                // $modelSanPham->Post($sanPham);
                // về trang danh sách
                if ($files == 0) {
                    // var_dump($_FILES["Form_SanPham"]);
                    $fromPath = $_FILES["Form_SanPham"]["tmp_name"]["UrlImages"];
                    $toPath = "public/upload/" . $_FILES["Form_SanPham"]["name"]["UrlImages"];
                    if (is_dir("public/upload") == false) {
                        mkdir("public/upload/", 0777);
                    }
                    move_uploaded_file($fromPath, $toPath);
                    $sanPham["UrlImages"] = "/" . $toPath;
                }
                $modelSanPham->Post($sanPham);
                Common::ToUrl("/backend/sanpham");
            } catch (Exception $th) {
                $error = $th->getMessage();
            }
            var_dump($sanPham);
        }
        $this->View();
    }

    /**s
     *
     * @return mixed
     */
    function put()
    {
        $modelSanPham = new SanPham();
        if (isset($_POST[SanPhamForm::FormName])) {
            $sanPham = $_POST[SanPhamForm::FormName];
            // lấy thông tin file img trên form
            $files = $_FILES["Form_SanPham"]["error"]["UrlImages"];
            // có file 
            // unset($sanPham["Id"]);
            $sanPhamDB = $modelSanPham->GetById($sanPham["Id"]);

            $sanPham["Price"] = floatval($sanPham["Price"]);
            $sanPham["SalePrice"] = floatval($sanPham["SalePrice"]);
            $sanPham["Content"] = htmlspecialchars($sanPham["Content"]);
            try {
                // không có trong database
                if ($sanPhamDB == null) {
                    throw new Exception("Không có sản phẩm muốn sửa");
                }
                $required = new Validation\Required("Bạn Chưa Nhập Mã Sản Phẩm");
                if ($required->isValid($sanPham["Code"]) == false) {
                    throw new Exception($required->getMessage);
                }
                $required = new Validation\Required("Bạn Chưa Nhập Tên Sản Phẩm");
                if ($required->isValid($sanPham["Name"]) == false) {
                    throw new Exception($required->getMessage);
                }
                // mã San Phẩm, Tên sản Phẩm
                // $modelSanPham = new SanPham();
                // $modelSanPham->Post($sanPham);
                // về trang danh sách

                if ($files == 0) {
                    // var_dump($_FILES["Form_SanPham"]);
                    $fromPath = $_FILES["Form_SanPham"]["tmp_name"]["UrlImages"];
                    $toPath = "public/upload/" . $_FILES["Form_SanPham"]["name"]["UrlImages"];
                    if (is_dir("public/upload") == false) {
                        mkdir("public/upload/", 0777);
                    }
                    move_uploaded_file($fromPath, $toPath);
                    $sanPham["UrlImages"] = "/" . $toPath;
                }
                $sanPhamDB["Code"] = $sanPham["Code"];
                $sanPhamDB["IdDM"] = $sanPham["IdDM"];
                $sanPhamDB["Name"] = $sanPham["Name"];
                $sanPhamDB["Decription"] = $sanPham["Decription"];
                $sanPhamDB["Price"] = $sanPham["Price"];
                $sanPhamDB["Keyword"] = $sanPham["Keyword"];
                $sanPhamDB["Title"] = $sanPham["Title"];
                $sanPhamDB["Content"] = $sanPham["Content"];
                $sanPhamDB["UrlImages"] = $sanPham["UrlImages"]
                    ?? $sanPhamDB["UrlImages"];
                $sanPhamDB["SalePrice"] = $sanPham["SalePrice"];
                $sanPhamDB["Active"] = $sanPham["Active"];
                $modelSanPham->Put($sanPhamDB);
                // Common::ToUrl("/backend/sanpham");
            } catch (Exception $th) {
                $error = $th->getMessage();
            }
            //  var_dump($sanPham);
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
    function export()
    {
        $sanPham = new SanPham();
        $totalRow = 0;
        $datarow = $sanPham->GetPaging([], 1, 10000, $totalRow);
        echo $totalRow;
        $data[0] = ["Id", "Code", "IdDM", "Name", "Decription", "Price", "Keyword", "Title", "Content", "UrlImages", "SalePrice", "Active"];
        while ($row = $datarow->fetch_assoc()) {
            $data[] = $row;
        }
        // var_dump($data);
        ExcelConfig::Export($data, "public/sanPham.Xlsx");
    }
}
