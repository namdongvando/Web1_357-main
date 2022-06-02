<?php

namespace App\frontend\Controller;

use Applications;
use Model\TinhThanh;

//  /api/index
class apiController extends Applications
{
    public function __construct()
    {
        // cho phép tất cả các domain lấy data từ server khác
        header('Access-Control-Allow-Origin: *');
        // kiểu hiển thị JSON có tiếng việt
        header('Content-Type: application/json; charset=utf-8');
    }
    function index()
    {
    }
    // /api/gettinhthanh 
    // lấy ra tất cả tỉnh thành quận huyện
    function gettinhthanh()
    {
        $tinhThanh = new TinhThanh();
        $danhSachTinhThanh = $tinhThanh->Get();
        $a = [];
        while ($row = $danhSachTinhThanh->fetch_assoc()) {
            $a[] = $row;
        }
        echo json_encode($a, JSON_UNESCAPED_UNICODE);
    }
}
