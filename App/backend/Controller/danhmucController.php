<?php

namespace App\backend\Controller;

use App\IController;
use Model\Common;
use Model\DanhMuc;
use Model\DB;
use Model\ExcelConfig;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function import()
    {
        if (isset($_FILES["FileData"])) {
            try {
                if ($_FILES["FileData"]["error"] != 0) {
                    throw new Exception("Bạn chưa chọn file.");
                }
                if ($_FILES["FileData"]["type"] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                    throw new Exception("File không đúng định dạng.");
                }
                // da có file excel
                // da có file
                // var_dump($_FILES);
                ini_set('memory_limit', '1024M');
                $fileData = $_FILES["FileData"]["tmp_name"];
                $reader = IOFactory::createReaderForFile($fileData);
                $reader->setReadDataOnly(true);
                $dataSheet = $reader->load($fileData);
                $dataSheet0 = $dataSheet->getSheet(0)->toArray();
                $danhMuc = new DanhMuc();
                foreach ($dataSheet0 as $index => $item) {
                    if ($index > 0) {
                        // them vào database 
                        $itemInsert["Id"] = $item[0];
                        $itemInsert["Name"] = $item[1];
                        $itemInsert["Decription"] = $item[2];
                        $itemInsert["IsDelete"] = $item[3];
                        // DB::$debug = true;
                        $danhMuc->Post($itemInsert);
                    }
                }
            } catch (Exception $ex) {
            }
        }

        $this->View();
    }
    function export()
    {
        // echo  $colName = ExcelConfig::GetCellName(0, 0);

        $danhMuc = new DanhMuc();
        $totalRow = 0;
        $dataRow = $danhMuc->GetPaging([], 1, 1000, $totalRow);
        $data[0] = ["Mã", "Tên", "Mô Tả", "Đã Xóa"];
        while ($row = $dataRow->fetch_assoc()) {
            $data[] = $row;
        }
        ExcelConfig::Export($data, "public/05featuredemo.xlsx");
    }
}
