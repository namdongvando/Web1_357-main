<?php
include("SuDungHam.php");
$kq = "";
if (isset($_GET["Soa"])) {
    $a = intval($_GET["Soa"]);
    $b = intval($_GET["Sob"]);
    $kq = PTB1($a,$b);
}
?>

<h2>ax + b = 0</h2>
<form action="" method="get">
    <input placeholder="Nhập Số A" type="number" name="Soa">
    <input placeholder="Nhập Số B" type="number" name="Sob">
    <button>Gửi</button>
    <p><?php echo "Kết Quả: {$kq}" ?></p>
</form>