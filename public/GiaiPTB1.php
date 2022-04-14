<?php 

$kq= "";
    if(isset($_GET["Soa"]) && isset($_GET["Sob"])){
        $a = intval($_GET["Soa"]);
        $b = intval($_GET["Sob"]);
        try {
            if($a == 0){
                if($b==0){
                        throw new Exception("Vô Số Nghiệm");    
                }else{
                    throw new Exception("Vô Nghiệm");    
                }
            }    
            // a khác 0
            $kq = -$b/$a;

        } catch (Exception $ex) {
            $kq = $ex->getMessage();
        }
        
    }

?>

<h2>ax + b = 0</h2>
<form action="" method="get">
    <input placeholder="Nhập Số A" type="number" name="Soa" >
    <input placeholder="Nhập Số B" type="number" name="Sob" >
    <button>Gửi</button>
    <p><?php echo "Kết Quả: {$kq}"?></p>
</form>