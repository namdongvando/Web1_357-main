<?php 
namespace Model;

use Exception;

class PhuongTrinh 
{ 
    
    public static function PTB1($a,$b)
    { 
        try {
            if($a==0){
                if($b==0){
                    throw new Exception("VSN");
                }else{
                    throw new Exception("VN");
                }
            }
            return -$b/$a;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

}


?>

