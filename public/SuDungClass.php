<?php

use Model\PhuongTrinh;
use Model\SanPham;

include("Model/SanPham.php");
include("Model/PhuongTrinh.php");

$pt = new PhuongTrinh;
echo $pt->PTB1(2,1);

// khoi  tao doi tuong
$sp = new SanPham();
// set gia tri cho doi tương
$sp->Ma = "sp001";
$sp->Ten = "But Long Den";
$sp->SL = "1000";
$sp->Gia = "1200";
$sp->NCC = "ncc1";
$sp->Kho = "kho1";
// xuất thông tin
echo $sp->Ma;
