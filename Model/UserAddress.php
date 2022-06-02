<?php

namespace Model;


class UserAddress extends DB implements IModelCRUD
{

    public $Id;
    public $UserId;
    public $Address;
    public $Province;
    public $District;
    public $Wad;


    const TableName = "nn_users_address";

    public function __construct($item = null)
    {
        parent::__construct();
        if (is_array($item) == false) {
            $id = $item;
            $item = $this->GetById($id);
        }
        $this->Id = $item["Id"] ?? null;
        $this->UserId = $item["UserId"] ?? null;
        $this->Address = $item["Address"] ?? null;
        $this->Province = $item["Province"] ?? null;
        $this->District = $item["District"] ?? null;
        $this->Wad = $item["Wad"] ?? null;
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

    public function GetOrderDetail()
    {
        $order = new OrderDetail();
        return $order->GetByOrderId($this->Id);
    }
    static function CreateId($count = 1)
    {
        // namThangNgay
        // SELECT COUNT(*) as `tong` FROM `nn_order` WHERE `DateCreate` LIKE '2022-06-01%';
        $order = new Order();
        $where =
            $order->WhereLike("DateCreate", Date("y-m-d", time()));
        $res = $order->SELECTROWS(self::TableName, $where);
        if ($res != null) {
            $count = $res->num_rows + 1;
        }
        // DH-20220602-1
        return Date("DH-ymd-", time()) . $count;
    }
}
