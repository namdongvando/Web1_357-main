<?php

namespace App\cart\Controller;

use Applications;
use Exception;
use Model\Common;
use Model\DB;
use Model\GioHang;
use Model\Order;
use Model\OrderDetail;
use Model\User;

class checkoutController extends Applications
{

    public function __construct()
    {
        $this->setTheme("Eshopper");
        $this->setLayout("Theme/Eshopper/layout_cart.phtml");
    }
    public function index()
    {
        if (isset($_POST["Fullname"])) {
            try {
                $item["Id"] = Order::CreateId(1);
                $item["UserId"] = $_POST["UserId"] ?? User::CurentUser()["Id"];
                $item["AddressId"] = $_POST["AddressId"] ?? 0;
                $item["Phone"] = $_POST["Phone"] ?? "";
                $item["Note"] = $_POST["Note"] ?? "";
                $item["TotalPrice"] = GioHang::TongTien();
                $item["CountProduct"] = count(GioHang::DanhSachSanPham());
                $item["DateTransfer"] = date("Y-m-d", time() + 3600 * 24);
                $item["DateCreate"] = date("Y-m-d H:i:s", time());
                $item["Status"] = 1;
                $item["PaymentStatus"] = 1;
                $modelorder = new Order();
                // thêm đơn hàng
                // DB::$debug = true;
                $modelorder->Post($item);
                // die();
                // thêm đơn hàng chi tiết
                $dsSp = GioHang::DanhSachSanPham();
                $modeOrderDetail = new OrderDetail();
                foreach ($dsSp as $ma => $sp) {
                    $orderDetail["IdOrder"] = $item["Id"];
                    $orderDetail["IdProduct"] = $sp["Id"];
                    $orderDetail["Numbers"] = $sp["number"];
                    $orderDetail["Price"] = $sp["Price"];
                    $modeOrderDetail->Post($orderDetail);
                }
                $gioHang = new GioHang();
                $gioHang->XoaTatCaGioHang();
                Common::ToUrl("/cart/checkout/success/{$item["Id"]}");
            } catch (Exception $ex) {
                // loi

            }
        }

        $this->View();
    }
    // trang thông báo đạt hàng thàng công.
    public function success()
    {
        $id = $this->getParams(0);
        $this->View(["id" => $id]);
    }
}
