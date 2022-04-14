<!-- xác dinh so a là số chăn hay so lẻ 
với a nhập từ form
-->
<?php 
$a = '';
if(isset($_GET["Soa"])){
    $a = intval($_GET["Soa"]);
    if ($a % 2 ==0) {
        // chia hết
        echo "{$a} là số chẵn";
    }else{
        echo "{$a} là số lẻ";
    }
}

?>
<form action="" method="get" >
    <input value="<?php echo $a; ?>" name="Soa" placeholder="Nhập Số a"  >
    <button>Gửi</button>
</form>

