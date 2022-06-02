<?php

namespace Model;

class OrderDetail extends DB implements IModelCRUD
{

    public $Id;
    public $IdOrder;
    public $IdProduct;
    public $Numbers;
    public $Price;


    const TableName = "nn_order_detail";

    public function __construct($item = null)
    {
        parent::__construct();
        if (is_array($item) == false) {
            $id = $item;
            $item = $this->GetById($id);
        }
        $this->Id = $item["Id"] ?? null;
        $this->IdOrder = $item["IdOrder"] ?? null;
        $this->IdProduct = $item["IdProduct"] ?? null;
        $this->Numbers = $item["Numbers"] ?? null;
        $this->Price = $item["Price"] ?? null;
    }

    function Post($item)
    {
        return $this->Insert(self::TableName, $item);
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
    function GetByOrderId($orderId)
    {
        $where = $this->WhereEq("IdOrder", $orderId);
        return $this->SELECTROWS(self::TableName, $where);
    }
}
