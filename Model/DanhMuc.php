<?php

namespace Model;

class DanhMuc  extends DB implements IModelCRUD
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
	function GetPaging($params, $pageIndex, $pageNumber)
	{
		//SELECT * FROM `nn_danhmuc` WHERE `Name` like '%a%'

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
	/**
	 *
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	function GetById($id)
	{
	}
	/**
	 */
}
