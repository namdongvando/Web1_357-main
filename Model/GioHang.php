<?php

namespace Model;

class GioHang
{
    const TenGioHang = "GioHang";
    public function __construct()
    {
    }
    public static function DanhSachSanPham()
    {
        return $_SESSION[self::TenGioHang];
    }
    public function ThemGioHang($sanpham)
    {
        $idSP = $sanpham["Id"];
        // kiểm tra xem có sản phẩm chưa?
        if (isset($_SESSION[self::TenGioHang][$idSP])) {
            $_SESSION[self::TenGioHang][$idSP]["number"]++;
            return;
        }
        // thêm mới
        $_SESSION[self::TenGioHang][$idSP] = $sanpham;
        return;
    }
    public function SuaGioHang($idSanPham, $number)
    {
    }
    public function XoaGioHang($idSanPham)
    {
    }
    public function XoaTatCaGioHang()
    {
    }
}
