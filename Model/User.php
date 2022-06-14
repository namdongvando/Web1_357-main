<?php

namespace Model;


class User extends DB implements IModelCRUD
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


    const TableName = "nn_users";

    public function __construct($item = null)
    {
        parent::__construct();
        if (is_array($item) == false) {
            $id = $item;
            $item = $this->GetById($id);
        }
        $this->Id = $item["Id"] ?? null;
        $this->Fullname = $item["Fullname"] ?? null;
        $this->Username = $item["Username"] ?? null;
        $this->Email = $item["Email"] ?? null;
        $this->Phone = $item["Phone"] ?? null;
        $this->Password = $item["Password"] ?? null;
        $this->Address = $item["Address"] ?? null;
        $this->Province = $item["Province"] ?? null;
        $this->District = $item["District"] ?? null;
        $this->Ward = $item["Ward"] ?? null;
    }

    function Province()
    {
        return new TinhThanh($this->Province);
    }
    function District()
    {
        return new TinhThanh($this->District);
    }
    function Ward()
    {
        return new TinhThanh($this->Ward);
    }
    static function CurentUser()
    {
        return $_SESSION["UserLogin"] ?? null;
    }
    public static function SetCurentUser($u)
    {
        $_SESSION["UserLogin"] = $u;
    }
    function Post($item)
    {
        return $this->Insert(self::TableName, $item);
    }

    public function GetUserByUserPassword($u, $p)
    {

        $p = sha1($p);
        $where = $this->WhereEq("Username", $u);
        $where .= $this->WhereAnd($this->WhereEq("Password", $p));
        return $this->SELECTROW(self::TableName, $where);
    }

    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Put($item)
    {
        return $this->UPDATE(
            self::TableName,
            $item,
            $this->WhereEq("Id", $item["Id"])
        );
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
        return $this->SELECTROW(
            self::TableName,
            $this->WhereEq("Id", $id)
        );
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
        $keyword = $params["keyword"] ?? "";
        $where = $this->WhereLike("Id", $keyword);
        return $this->SELECTROWS(
            self::TableName,
            $where
        );
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function Delete($id)
    {
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
