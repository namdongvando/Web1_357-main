<?php

namespace Model;

class Menu extends DB implements IModelCRUD
{
    const TableName = "nn_menu";
    public $Id;
    public $Name;
    public $Link;
    public $GroupName;
    public $STT;
    public $Icon;
    public $CapCha;
    function __construct($item = null)
    {
        parent::__construct();
        if (!is_array($item)) {
            $id = $item;
            $item = $this->GetById($id);
        }
        $this->Id = $item["Id"] ?? null;
        $this->Name = $item["Name"] ?? null;
        $this->Link = $item["Link"] ?? null;
        $this->GroupName = $item["GroupName"] ?? null;
        $this->STT = $item["STT"] ?? null;
        $this->Icon = $item["Icon"] ?? null;
        $this->CapCha = $item["CapCha"] ?? null;
    }
    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Post($item)
    {

        return $this->INSERT(self::TableName, $item);
    }

    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Put($item)
    {
        return $this->UPDATE(self::TableName, $item, $this->WhereEq("Id", $item["Id"]));
    }

    /**
     *
     * @return mixed
     */
    function Get()
    {
        return $this->SELECTROWS(self::TableName, "1=1");
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
        $where = $this->WhereLike("Name", $keyword);
        return $this->QueryPaging(self::TableName,  $where, $pageIndex, $pageNumber, $totalRows);
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function Delete($id)
    {
        return $this->DELETEDB(self::TableName, $this->WhereEq("Id", $id));
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
    function SelectMenu2Options($groupsName)
    {
        $where = $this->WhereEq("GroupName", $groupsName);
        return $this->Select2Options(self::TableName, $where, ["Id", "Name"]);
    }
    function GetByGroupNameCapCha($groupsName, $capCha)
    {
        $where = $this->WhereEq("GroupName", $groupsName);
        $where .= $this->WhereAnd($this->WhereEq("CapCha", $capCha));
        return $this->SELECTROWS(self::TableName, $where);
    }
}
