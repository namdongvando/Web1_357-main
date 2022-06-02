<?php

namespace Model;

class TinhThanh extends DB implements IModelCRUD
{
    const TableName = "nn_tinhthanh";
    public $Id;
    public $Name;
    public $Alias;
    public $IDP;
    public $isShow;
    public $Note;
    function __construct($tinhthanh = null)
    {
        parent::__construct();
        if (!is_array($tinhthanh)) {
            $id = $tinhthanh;
            $tinhthanh = $this->GetById($id);
        }
        $this->Id = $tinhthanh["Id"] ?? null;
        $this->Name = $tinhthanh["Name"] ?? null;
        $this->Alias = $tinhthanh["Alias"] ?? null;
        $this->IDP = $tinhthanh["IDP"] ?? null;
        $this->isShow = $tinhthanh["isShow"] ?? null;
        $this->Note = $tinhthanh["Note"] ?? null;
    }
    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Post($item)
    {
    }

    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Put($item)
    {
    }

    function GetByParent($id)
    {
        return $this->SELECTROWS(
            self::TableName,
            $this->WhereEq("IDP", $id)
        );
    }
    /**
     *
     * @return mixed
     */
    function Get()
    {
        return $this->SELECTROWS(
            self::TableName,
            "1 =1"
        );
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
