<?php

namespace Model;

class ThongKe extends DB
{

    function ThongKeSanPhamDonHang()
    {
        $sql = "SELECT b.`IdProduct`,c.`Name`,SUM(b.`Numbers`) as `TongSoSanPham` FROM `nn_order` as a,`nn_order_detail` as b , `nn_sanpham` as c  WHERE  a.`Id` = b.`IdOrder` AND c.Id=b.`IdProduct` AND a.`Status` = 1
        GROUP BY b.`IdProduct`";
        return $this->query($sql);
    }
}
