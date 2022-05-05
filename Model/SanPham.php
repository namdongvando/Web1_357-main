<?php
// php >= 5.4 // 8.
namespace Model;

class SanPham extends DB implements IModelCRUD
{
    /**
     */
    function __construct()
    {
    }
    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Post($item)
    {
        return $this->INSERT("nn_sanpham", $item);
    }

    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    function Put($item)
    {
        return $this->UPDATE("nn_sanpham", $item, $this->WhereEq("Id", $item["Id"]));
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
            "nn_sanpham",
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
        return $this->QueryPaging("nn_sanpham", "", $pageIndex, $pageNumber, $totalRows);
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
