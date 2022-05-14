<?php

namespace Model;

class Setting extends DB implements IModelCRUD
{
    const TableName = "nn_setting";
    public $Id;
    public $Code;
    public $Name;
    public $Description;
    function __construct($item = null)
    {
        parent::__construct();
        if (!is_array($item)) {
            $id = $item;
            $item = $this->GetById($id);
        }
        $this->Id = $item["Id"] ?? null;
        $this->Code = $item["Code"] ?? null;
        $this->Name = $item["Name"] ?? null;
        $this->Description = $item["Description"] ?? null;
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
        $where .= $this->WhereOr($this->WhereLike("Description", $keyword));
        $where .= $this->WhereOr($this->WhereLike("Code", $keyword));
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
}
