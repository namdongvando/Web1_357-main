<?php

namespace Model;

class DanhMuc extends DB implements IModelCRUD
{
	public $Id;
	public $Name;
	public $Decription;
	public $IsDelete;

	function __construct($item = null)
	{
		$this->Id = isset($item["Id"]) ? $item["Id"] : null;
		$this->Name = isset($item["Name"]) ? $item["Name"] : null;
		$this->Decription = isset($item["Decription"]) ? $item["Decription"] : null;
		$this->IsDelete = isset($item["IsDelete"]) ? $item["IsDelete"] : null;

		parent::__construct();
	}

	/**
	 *
	 * @param mixed $item
	 *
	 * @return mixed
	 */
	function Post($item)
	{
		$sql = "INSERT INTO `nn_danhmuc` 
        (`Id`, `Name`, `Decription`, `IsDelete`) 
        VALUES (NULL, 
        '{$item["Name"]}', 
        '{$item["Decription"]}', 
        '{$item["IsDelete"]}')";
		return $this->query($sql);
	}

	/**
	 *
	 * @param mixed $item
	 *
	 * @return mixed
	 */
	function Put($item)
	{
		$sql = "UPDATE `nn_danhmuc` SET  
		`Name`='{$item["Name"]}',
		`Decription`='{$item["Decription"]}'
		,`IsDelete`='{$item["IsDelete"]}' 
		WHERE `Id`  = {$item["Id"]}";
		$this->query($sql);
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
		)
	{
		$keyword = isset($params["keyword"])
			? $params["keyword"] : '';
		// cau lenh truy van
		$sql = "SELECT * FROM 
		`nn_danhmuc` WHERE `Name` like '%{$keyword}%' or
		`Id` like '%{$keyword}%'";
		$result = $this->query($sql);
		// var_dump($result);
		if ($result) {
			// to so dong tra ve
			$totalRows = $result->num_rows;
		}
		// tinh vi tri cac dong cần tra ve
		$start = ($pageIndex - 1) * $pageNumber;
		// lấy các dòng
		$sql .= " limit {$start}, $pageNumber";
		return $this->query($sql);
	}

	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function Delete($id)
	{
		$sql = "UPDATE `nn_danhmuc` SET 
		`IsDelete`='1' WHERE `Id` = {$id}";
		$this->query($sql);
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
		$sql = "SELECT * FROM `nn_danhmuc` WHERE `Id` = {$id} ";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			return $result->fetch_assoc();
		}
		return null;
	}
	public function IsDelete()
	{
		$a = ["Hiện", "Ẩn"];
		return $a[$this->IsDelete];
	}
}
