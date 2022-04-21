<?php

namespace Model;

class Admin extends DB
{
    public $Id;
    public $Fullname;
    public $Username;
    public $Email;
    public $Phone;
    public $Password;
    public $Address;
    public $Province;
    public $District;
    public $Ward;

    function __construct($admin = null)
    {
        // gọi kết nối database
        parent::__construct();
        $this->Id = isset($admin["Id"]) ? $admin["Id"] : null;
        $this->Fullname = isset($admin["Fullname"]) ? $admin["Fullname"] : null;
        $this->Username = isset($admin["Username"]) ? $admin["Username"] : null;
        $this->Email = isset($admin["Email"]) ? $admin["Email"] : null;
        $this->Phone = isset($admin["Phone"]) ? $admin["Phone"] : null;
        $this->Password = isset($admin["Password"]) ? $admin["Password"] : null;
        $this->Address = isset($admin["Address"]) ? $admin["Address"] : null;
        $this->Province = isset($admin["Province"]) ? $admin["Province"] : null;
        $this->District = isset($admin["District"]) ? $admin["District"] : null;
        $this->Ward = isset($admin["Ward"]) ? $admin["Ward"] : null;
    }

    public static function CurentUser()
    {
        return $_SESSION["Quantri"];
    }
    // sửa cai gì o dâu
    public function UpdateUser($user)
    {
        $sql = "UPDATE `nn_admin` SET 
        `Fullname` = '{$user["Fullname"]}', 
        `Email` = '{$user["Email"]}', 
        `Phone` = '{$user["Phone"]}', 
        `Address` = '{$user["Address"]}', 
        `Province` = '{$user["Province"]}', 
        `District` = '{$user["District"]}', 
        `Ward` = '{$user["Ward"]}' 
        WHERE  `Id` = '{$user["Id"]}'";
        $result =  $this->query($sql);
        return $result;
    }

    public function SetCurentUser($user)
    { 
        $_SESSION["Quantri"] = $user;
    }

    // SELECT * FROM `nn_admin` 
    //WHERE `Username` = "teonv" 
    //and `Password` = '123456'
    public function getUserByPassword($username, $password)
    {
        $sql = "SELECT * FROM `nn_admin` WHERE `Username` = '{$username}' and `Password` = '{$password}'";
        $result = $this->GetByQuery($sql);
        if ($result == null) {
            return null;
        }
        // nếu có dòng trả về thì lấy dong đầu 
        // tiên
        return $result->fetch_assoc();
    }
}
