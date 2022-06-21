<?php

namespace Model;

class LoaiTin extends DB implements IModelCRUD
{
    public $Id;
    public $Name;
    public $Description;
    public $Alias;
    public $Parents;

    const tableName = "nn_loaitin";

    function __construct($item = null)
    {
        if (!is_array($item)) {
            $id = $item;
            $item = $this->GetById($id);
        }

        $this->Id = $item["Id"] ?? null;
        $this->Name = $item["Name"] ?? null;
        $this->Description = $item["Description"] ?? null;
        $this->Alias = $item["Alias"] ?? null;
        $this->Parents = $item["Parents"] ?? null;
    }

    function Post($item)
    {
        $item["Alias"] = Common::vn_to_str($item["Name"]);
        return $this->INSERT(self::tableName, $item);
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
            self::tableName,
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
        return $this->SELECTROW(self::tableName, $this->WhereEq("Id", $id));
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
        $where .= $this->WhereOr($this->WhereLike("Name", $keyword));
        return $this->QueryPaging(
            self::tableName,
            $where,
            $pageIndex,
            $pageNumber,
            $totalRows
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
        return  $this->DELETEDB(self::tableName, $this->WhereEq("Id", $id));
    }

    function Remove($id)
    {
    }
}
