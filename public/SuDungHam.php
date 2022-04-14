<?php

function TinhNgay($nam, $thang)
{
    $ngay = 30;
    $thang31 = [1, 3, 5, 7, 8, 10, 12];
    if (in_array($thang, $thang31)) {
        return 31;
    }
    if ($thang == 2) {
        if ($nam % 4 == 0) {
            return 29;
        } else {
            return 28;
        }
    }
    return $ngay;
}

// ax + b = 0
function PTB1($soa,$sob)
{ 
    try {
        if($soa ==0){
            if($sob==0){
                throw new Exception("VSN");
            }else{
                throw new Exception("VN");
            }
        }
        // khac 0 
        return -$sob/$soa;
    } catch (Exception $ex) {
        return $ex->getMessage();    
    }
}
function PTB2($a,$b,$c)
{ 
    try{
        $d = pow($b,2) - $a*$c*4;
        if($d<0){
            throw new Exception("VN");
        }
        $x1 = (-$b+sqrt($d))/(2*$a);
        $x2 = (-$b-sqrt($d))/(2*$a);
        return [$x1,$x2];
    }catch(Exception $ex){
        return $ex->getMessage();
    } 
}
//var_dump(PTB2(2,8,1)) ;
//echo PTB1(2,3);
 
//echo TinhNgay(2021,1);
