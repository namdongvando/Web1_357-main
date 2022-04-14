<?php
$kq = "";
if (isset($_GET["Gui"])) {
    var_dump($_GET);
    var_dump($_REQUEST);
    try {
        $a = intval($_GET["Soa"]);
        $b = intval($_GET["Sob"]);
        $c = intval($_GET["Soc"]);
        if ($a == 0) {
            throw new Exception("PT không Dung");
        }
        $detal = pow($b, 2) * $a * $c;
        if ($detal < 0) {
            throw new Exception("PT Vo Nghiệm");
        }
        $x1 = (-$b + sqrt($detal)) / (2 * $a);
        $x1 = number_format($x1,2,".",","); 

        $x2 = (-$b - sqrt($detal)) / (2 * $a);
        $x2 = number_format($x2,2,".",",");
        $kq = "X1={$x1};X2={$x2}";
    } catch (Exception $ex) {
        $kq = $ex->getMessage();
    }
}

?>
<h2>
    ax<sup>2</sup>
    +bx + c =0
</h2>
<form action="" method="get">
    <input required placeholder="Nhập Số A" type="number" name="Soa">
    <input required placeholder="Nhập Số B" type="number" name="Sob">
    <input required placeholder="Nhập Số C" type="number" name="Soc">
    <button name="Gui">Gửi</button>
    <p><?php echo "Kết Quả: {$kq}" ?></p>
</form>