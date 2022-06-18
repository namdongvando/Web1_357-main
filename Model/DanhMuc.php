<?php

namespace Model;

class DanhMuc extends DB implements IModelCRUD
{
	public $Id;
	public $Name;
	public $Decription;
	public $IsDelete;

	const tableName = "nn_danhmuc";

	function __construct($item = null)
	{
		$this->Id = isset($item["Id"]) ? $item["Id"] : null;
		$this->Name = isset($item["Name"]) ? $item["Name"] : null;
		$this->Decription = isset($item["Decription"]) ? $item["Decription"] : null;
		$this->IsDelete = isset($item["IsDelete"]) ? $item["IsDelete"] : null;

		parent::__construct();
	}

	public static function Get2Option()
	{
		$dm = new DanhMuc();
		$dsDM = $dm->Get();
		$a = [];
		while ($row = $dsDM->fetch_assoc()) {
			$a[$row["Id"]] = $row["Name"];
		}
		return $a;
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
		return $this->SELECTROWS(self::tableName, "1=1");
	}

	/**
	 *
	 * @param mixed $params
	 * @param mixed $pageIndex
	 * @param mixed $pageNumber
	 *
	 * @return mixed
	 */
	function GetPaging(
		$params,
		$pageIndex,
		$pageNumber,
		&$totalRows
	) {
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
		return $this->DELETEDB(self::tableName, $this->WhereEq("Id", $id));
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
	public function IsDelete()
	{
		$a = ["Hiện", "Ẩn"];
		return $a[$this->IsDelete];
	}

	// lấy sản phẩm theo danh mục hiện tại
	public function GetSanPhams($number)
	{
		$sanpham = new SanPham();
		return $sanpham->GetSanPhamTheoDanhMuc($this->Id, $number);
	}
}
