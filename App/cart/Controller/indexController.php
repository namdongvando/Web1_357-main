<?php

namespace App\cart\Controller;

use Applications;
use Model\Common;
use Model\GioHang;
use Model\SanPham;

class indexController extends Applications
{

    public function __construct()
    {
        $this->setTheme("Eshopper");
        $this->setLayout("Theme/Eshopper/layout_cart.phtml");
    }
    // trang hiển thị giỏ hàng
    // cart/index/index
    public function index()
    {
        $this->View();
    }

    public function AddToCart()
    {
        $idSanPham = $_REQUEST["id"] ?? null;
        $soLuong = $_REQUEST["num"] ?? 0;
        $soLuong = max(1, $soLuong);
        $modelSanPham = new SanPham();
        $sp = $modelSanPham->GetById($idSanPham);
        if ($sp == null) {
            // nếu không có sản phẩm thì quay lại trang trước
            Common::ToUrl($_SERVER["HTTP_REFERER"]);
            // kết thúc
            return;
        }
        // số lượng 1
        $sp["number"] = $soLuong;
        $giohang = new GioHang();
        $giohang->ThemGioHang($sp);
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    public function add()
    {
        $giohang = new GioHang();
        $modelSanPham = new SanPham();
        // thêm sản phẩm có mã $this->getParams(0)
        $sp = $modelSanPham->GetById($this->getParams(0));
        if ($sp == null) {
            // nếu không có sản phẩm thì quay lại trang trước
            Common::ToUrl($_SERVER["HTTP_REFERER"]);
            // kết thúc
            return;
        }
        // số lượng 1
        $sp["number"] = 1;
        $giohang->ThemGioHang($sp);
        // chuyển đến giỏ hàng
        Common::ToUrl("/cart/index/index");
    }
    public function plus()
    {
        $gioHang = new GioHang();
        $idSanPham = $this->getParams(0);
        $gioHang->ThemSoLuong($idSanPham, 1);
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
    public function minu()
    {
        $gioHang = new GioHang();
        $idSanPham = $this->getParams(0);
        $gioHang->GiamSoLuong($idSanPham, 1);
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
    public function remove()
    {
        $gioHang = new GioHang();
        $idSanPham = $this->getParams(0);
        $gioHang->XoaGioHang($idSanPham);
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
}
