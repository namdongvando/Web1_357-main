<?php 
// nhận tháng 
// nhận năn
// xuất ra dang sách option
try{
    // kiểm tra xem có tháng và năm không?
    if(!isset($_GET["thang"])
    || !isset($_GET["nam"]))
    {
        throw new Exception("Không có tham số");
    }
    // ép kiểu tử string -> int
    $thang = intval($_GET["thang"]) ;
    $nam = intval($_GET["nam"]);
    // kiểm tra tính hợp lệ của năm và tháng
    $nam = max($nam,1);
    $thang = max($thang,1);
    // trả về tháng nếu nhỏ hơn 12
    // lớn hơn 12 -> trả về 12
    $thang = min($thang,12);
     // tháng nam đã hợp lệ 
    // echo $thang;
    // echo $nam;
    $ngay = 30;
    // khai báo các tháng  có 31 ngày
    $thang31 = [1,3,5,7,8,10,12];
    if(in_array($thang,$thang31)==true){
        // thang nhập thuộc tháng 31  ngày
        $ngay = 31;
    }
    // thang 2 
    if($thang == 2){
        if($nam % 4 == 0){
            $ngay = 29;
        }else{
            $ngay = 28;
        }
    }
    // có số ngày theo thang năm
    // tạo option 
    for ($i=1; $i <= $ngay ; $i++) { 
        echo <<<OP
        <option value="{$i}" >Ngày {$i}</option>
OP;
    }

}catch(Exception $ex){
    
}



?>