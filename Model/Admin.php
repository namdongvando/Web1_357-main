<?php

namespace Model;

class Admin extends DB implements IModelCRUD
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
        if (!is_array($admin)) {
            $id = $admin;
            $admin = $this->GetById($id);
        }
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


    public function ResetPassword($id, $newPassword)
    {
        // B1 lấy thông tin của tài khoản từ database
        $admin = $this->GetById($id);
        // B2 cập nhật mật khẩu -> mã hóa mật khẩu
        $admin["Password"] = sha1($newPassword);
        return $this->Put($admin);
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
        $result = self::$DbConnect->query($sql);
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
    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Post($item)
    {

        $sql = "INSERT INTO 
        `nn_admin` (`Id`, `Fullname`, `Username`, `Email`, `Phone`, `Password`, `Address`, `Province`, `District`, `Ward`) 
        VALUES (
            NULL, 
            '{$item["Fullname"]}', 
            '{$item["Username"]}', 
            '{$item["Email"]}', 
            '{$item["Phone"]}', 
            '{$item["Password"]}', 
            '{$item["Address"]}', 
            '{$item["Province"]}', 
            '{$item["District"]}', 
            '{$item["Ward"]}')";
        return self::$DbConnect->query($sql);
    }

    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Put($item)
    {
        $sql = "UPDATE `nn_admin` SET 
`Fullname`='{$item["Fullname"]}',
`Username`='{$item["Username"]}',
`Email`='{$item["Email"]}',
`Phone`='{$item["Phone"]}',
`Password`='{$item["Password"]}',
`Address`='{$item["Address"]}',
`Province`='{$item["Province"]}',
`District`='{$item["District"]}',
`Ward`='{$item["Ward"]}' WHERE `Id`='{$item["Id"]}'";
        return self::$DbConnect->query($sql);
    }

    /**
     *
     * @return mixed
     */
    function Get()
    {
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function GetById($id)
    {
        $sql = "SELECT * FROM `nn_admin` WHERE `Id` = {$id}";
        $result = self::$DbConnect->query($sql);
        if ($result == null)
            return null;
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    /**
     *
     * @param mixed $params
     * @param mixed $pageIndex
     * @param mixed $pageNumber
     * @param mixed $totalRows
     *
     * @return mixed
     */
    function GetPaging($params, $pageIndex, $pageNumber, &$totalRows)
    {
        $keyword = isset($params["keyword"]) ? $params["keyword"] : "";
        // $where = "`Fullname` like '%{$keyword}%' or 
        // `Username` like '%{$keyword}%' or 
        // `Email` like '%{$keyword}%' or 
        // `Phone` like '%{$keyword}%'";
        $where = $this->WhereLike("Fullname", $keyword);
        $where .= $this->WhereOr($this->WhereLike("Username", $keyword));
        $where .= $this->WhereOr($this->WhereLike("Email", $keyword));
        $where .= $this->WhereOr($this->WhereLike("Phone", $keyword));
        // echo $where;
        return $this->QueryPaging("nn_admin", $where, $pageIndex, $pageNumber, $totalRows);
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function Delete($id)
    {
        // return $this->DeleteQuery("nn_admin", "`Id` = '{$id}'");
        return $this->DeleteQuery("nn_admin", $this->WhereEq("Id", $id));
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function Remove($id)
    {
    }
}
