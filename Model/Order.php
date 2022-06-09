<?php

namespace Model;


class Order extends DB implements IModelCRUD
{

    public $Id;
    public $UserId;
    public $AddressId;
    public $Phone;
    public $Note;
    public $TotalPrice;
    public $CountProduct;
    public $DateTransfer;
    public $DateCreate;
    public $Status;
    public $PaymentStatus;

    const TableName = "nn_order";

    public function __construct($item = null)
    {
        parent::__construct();
        if (is_array($item) == false) {
            $id = $item;
            $item = $this->GetById($id);
        }
        $this->Id = $item["Id"] ?? null;
        $this->UserId = $item["UserId"] ?? null;
        $this->AddressId = $item["AddressId"] ?? null;
        $this->Phone = $item["Phone"] ?? null;
        $this->Note = $item["Note"] ?? null;
        $this->TotalPrice = $item["TotalPrice"] ?? null;
        $this->CountProduct = $item["CountProduct"] ?? null;
        $this->DateTransfer = $item["DateTransfer"] ?? null;
        $this->DateCreate = $item["DateCreate"] ?? null;
        $this->Status = $item["Status"] ?? null;
        $this->PaymentStatus = $item["PaymentStatus"] ?? null;
    }

    // tài khoản đạt hàng của đơn hàng hiện tại
    function User()
    {
        return new User($this->UserId);
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
        return Date("DH-Ymd-", time()) . $count;
    }
    function GetByUserId($idUser, $pageIndex, $pageNumber, &$totalRows)
    {
        $where = $this->WhereEq("UserId", $idUser);
        return $this->QueryPaging(
            self::TableName,
            $where,
            $pageIndex,
            $pageNumber,
            $totalRows
        );
    }
}
