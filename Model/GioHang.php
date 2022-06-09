<?php

namespace Model;

class GioHang
{
    const TenGioHang = "GioHang";
    public function __construct()
    {
    }

    function DatHangThanhCong($maDonHang)
    {
        $content = "";
        $path = "public/pagesCartSuccess.html";
        if (file_exists($path)) {
            $content = file_get_contents($path);
        }
        $order = new Order($maDonHang);

        // thông tin người mua
        $nguoiMua = <<<NGUOIMUA
        <table class="table " >
                        <tr>
                            <td>Họ Tên</td>
                            <td>{$order->User()->Fullname}</td>
                        </tr>
                        <tr>
                            <td>SDT</td>
                            <td>{$order->Phone}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{$order->User()->Email}</td>
                        </tr>
                    </table>  
NGUOIMUA;
        $dsSanPham =  $this->DanhSachSanPhamHtml($order->GetOrderDetail());
        // danh sách sản phẩm

        $content = str_replace("[NguoiMua]", $nguoiMua, $content);
        $content = str_replace("[DSSanPham]", $dsSanPham, $content);
        return $content;
    }

    public function DanhSachSanPhamHtml($DanhSachSanPham)
    {
        ob_start();
?>
        <table class="table">

            <?php
            foreach ($DanhSachSanPham as $maSanPham => $sanpham) {

                $_item = new SanPham($sanpham["IdProduct"]);
                $_item->number = $sanpham["Numbers"];
                $_item->Price = $sanpham["Price"];
            ?>
                <tr>
                    <td class="cart_product" style="margin: 0px;">
                        <a href=""><img onerror="handleError(this);" style="height: 100px;" src="<?php echo $_item->UrlImages; ?>" alt="<?php echo $_item->Name ?>" /></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?php echo $_item->Name ?></a></h4>
                        <p>Web ID: <?php echo $_item->Id ?></p>
                        <p>SL: <?php echo $_item->number ?></p>
                    </td>
                    <td class="cart_price">
                        <p><?php echo $_item->Price() ?></p>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price"><?php echo $_item->ThanhTienView() ?></p>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
<?php $str = ob_get_clean();
        return $str;
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
    public static function TongTien()
    {
        $GioHang = new GioHang();
        $dsSanPham = $GioHang->DanhSachSanPham();
        $tong = 0;
        foreach ($dsSanPham as $idSP => $SanPham) {
            $_sp = new SanPham($SanPham);
            $thanhTien = $_sp->ThanhTien();
            $tong += $thanhTien;
        }
        return $tong;
    }
    public static function Thue()
    {
        $tongTien =  self::TongTien();
        return $tongTien * 0.1;
    }
    public static function PhiGiaoHang()
    {
        return 0;
    }
    public static function TamTinh()
    {
        $tongTien = self::TongTien();
        $Thue = self::Thue();
        $phiGiaoHang = self::PhiGiaoHang();
        return $tongTien + $Thue + $phiGiaoHang;
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
