<?php

namespace Model;

class Pages extends DB implements IModelCRUD
{
    public $Id;
    public $Name;
    public $Des;
    public $Keyword;
    public $Alias;
    public $Content;
    public $Lang;
    public $Images;
    public $RecCreateDate;
    public $RecUpdateDate;
    public $User;
    public $isDelete;

    const tableName = "nn_pages";

    function __construct($item = null)
    {
        if (is_array($item) == false) {
            $id = $item;
            $item = $this->GetById($id);
        }
        $this->Id = $item["Id"] ?? null;
        $this->Name = $item["Name"] ?? null;
        $this->Des = $item["Des"] ?? null;
        $this->Keyword = $item["Keyword"] ?? null;
        $this->Alias = $item["Alias"] ?? null;
        $this->Content = $item["Content"] ?? null;
        $this->Lang = $item["Lang"] ?? null;
        $this->Images = $item["Images"] ?? null;
        $this->RecCreateDate = $item["RecCreateDate"] ?? null;
        $this->RecUpdateDate = $item["RecUpdateDate"] ?? null;
        $this->User = $item["User"] ?? null;
        $this->isDelete = $item["isDelete"] ?? 1;
    }

    public function Content()
    {
        return htmlspecialchars_decode($this->Content);
    }
    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Post($item)
    {
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
        $where = $this->WhereLike("Name", $keyword);
        // DB::$debug = true;
        return $this->QueryPaging(self::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function Delete($id)
    {
        $where = $this->WhereEq("Id", $id);
        $this->DELETEDB(self::tableName, $where);
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function Remove($id)
    {
        $data = ["isDelete" => "1"];
        $this->UPDATE(self::tableName, $data, $this->WhereEq("Id", $id));
    }
}
