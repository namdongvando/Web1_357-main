<?php
// php >= 5.4 // 8.
namespace Model;

class SanPham extends DB implements IModelCRUD
{
    const tableName = "nn_sanpham";
    public $Id;
    public $Code;
    public $IdDM;
    public $Name;
    public $Decription;
    public $Price;
    public $Keyword;
    public $Title;
    public $Content;
    public $UrlImages;
    public $SalePrice;
    public $Active;
    public $number;
    /**
     */

    function __construct($sp = null)
    {
        // kết nối database
        parent::__construct();
        if (is_array($sp) == false) {
            $id = $sp;
            $sp = $this->GetById($id);
        }
        $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
        $this->Code = isset($sp["Code"]) ? $sp["Code"] : null;
        $this->IdDM = isset($sp["IdDM"]) ? $sp["IdDM"] : null;
        $this->Name = isset($sp["Name"]) ? $sp["Name"] : null;
        $this->Decription = isset($sp["Decription"]) ? $sp["Decription"] : null;
        $this->Price = isset($sp["Price"]) ? $sp["Price"] : null;
        $this->Keyword = isset($sp["Keyword"]) ? $sp["Keyword"] : null;
        $this->Title = isset($sp["Title"]) ? $sp["Title"] : null;
        $this->Content = isset($sp["Content"]) ? $sp["Content"] : null;
        $this->UrlImages = isset($sp["UrlImages"]) ? $sp["UrlImages"] : null;
        $this->SalePrice = isset($sp["SalePrice"]) ? $sp["SalePrice"] : null;
        $this->Active = isset($sp["Active"]) ? $sp["Active"] : null;
        $this->number = $sp["number"] ?? 0;
    }

    function LinkChiTiet()
    {
        return "/index/sanpham/" . $this->Id;
    }
    public function ThanhTien()
    {
        return $this->Price * $this->number;
    }
    public function ThanhTienView()
    {
        return Common::ViewMoney($this->Price * $this->number);
    }
    /**
     *
     * @param mixed $item
     *
     * @return mixed
     */
    public function Content()
    {
        return htmlspecialchars_decode($this->Content);
    }
    public function Price()
    {
        return Common::ViewMoney($this->Price);
    }
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
        $keyword = $params["keyword"] ?? "";
        // $keyword = isset($params["keyword"]) ? $params["keyword"] : "";

        $where = $this->WhereLike("Id", $keyword);
        $where .= $this->WhereOr($this->WhereLike("Name", $keyword));
        $where .= $this->WhereOr($this->WhereLike("Decription", $keyword));
        $where .= $this->WhereOr($this->WhereLike("Title", $keyword));
        $where .= $this->WhereOr($this->WhereLike("Keyword", $keyword));

        return $this->QueryPaging("nn_sanpham",  $where, $pageIndex, $pageNumber, $totalRows);
    }

    /**
     *
     * @param mixed $id
     *
     * @return mixed
     */
    function Delete($id)
    {
        return $this->DELETEDB("nn_sanpham", $this->WhereEq("Id", $id));
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
    // lay ra san pham noi bat
    public function GetFeaturesItems($number = 10)
    {
        // DB::$debug = true;
        $where = " 1=1 ";
        $where .= $this->OrderBy(["Id"], true);
        $where .= $this->Limit(0, $number);
        return $this->SELECTROWS(self::tableName, $where);
    }
    function GetSanPhamTheoDanhMuc($idDm, $number = 10)
    {
        $where = $this->WhereEq("IdDM", $idDm);
        $where .= $this->OrderBy(["Id"], true);
        $where .= $this->Limit(0, $number);
        return $this->SELECTROWS(self::tableName, $where);
    }
}
