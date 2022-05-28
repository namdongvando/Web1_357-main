<?php

namespace Model;

class GioHang
{
    const TenGioHang = "GioHang";
    public function __construct()
    {
    }
    public function ThemSoLuong($idSanPham, $sl)
    {
        $_SESSION[self::TenGioHang][$idSanPham]["number"] += $sl;
        return;
    }
    public function GiamSoLuong($idSanPham, $sl)
    {
        $_SESSION[self::TenGioHang][$idSanPham]["number"] -= $sl;
        $slsp = $_SESSION[self::TenGioHang][$idSanPham]["number"];
        $_SESSION[self::TenGioHang][$idSanPham]["number"] =
            max(1, $_SESSION[self::TenGioHang][$idSanPham]["number"]);
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
        // sửa số lượng của sản phẩm trong giỏ hàng
        $_SESSION[self::TenGioHang][$idSanPham]["number"] = $number;
    }
    public function XoaGioHang($idSanPham)
    {
        // bỏ sản phẩm theo mã
        unset($_SESSION[self::TenGioHang][$idSanPham]);
    }
    public function XoaTatCaGioHang()
    {
        $_SESSION[self::TenGioHang] = [];
    }
    public static function linkThemGioHang($maSanPham)
    {
        return "/cart/index/add/{$maSanPham}";
    }
    public static function LinkThemSoLuong($maSanPham)
    {
        return "/cart/index/plus/{$maSanPham}";
    }
    public static function LinkGiamSoLuong($maSanPham)
    {
        return "/cart/index/minu/{$maSanPham}";
    }
    public static function LinkXoaSanPham($maSanPham)
    {
        return "/cart/index/remove/{$maSanPham}";
    }
}
