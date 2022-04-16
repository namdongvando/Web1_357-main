<?php

namespace Model;

use mysqli;

class DB extends mysqli
{

    function __construct()
    {
        $this->connect("localhost", "root", "", "banhang");
        // chuyển qua tiếng việt
        $this->set_charset("utf8");
    }

    public function GetByQuery($sql)
    {
        // câu lệnh truy  vấn mysql
        //$sql = "SELECT * FROM `nn_danhmuc` WHERE 1";    
        
        $result = $this->query($sql);
        if ($result) {
            return $result;
        }
        return null;
    }
}
