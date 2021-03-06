<?php

namespace Model;

use Exception;
use mysqli;

class DB extends mysqli
{
    public static $debug = false;
    public static $DbConnect;
    function __construct()
    {
        if (self::$DbConnect == null) {
            $this->ConnectDB();
        }
    }

    public function ConnectDB()
    {
        if (self::$DbConnect == null) {
            self::$DbConnect =  new  mysqli("localhost", "root", "", "banhang");
            self::$DbConnect->set_charset("utf8");
        }
    }

    public function GetByQuery($sql)
    {
        // câu lệnh truy  vấn mysql
        //$sql = "SELECT * FROM `nn_danhmuc` WHERE 1";    

        $result = self::$DbConnect->query($sql);
        if ($result) {
            return $result;
        }
        return null;
    }

    public function DeleteQuery($tableName, $where = null)
    {
        if ($where == null) {
            return;
        } //" `id` = '10' "; 
        echo $sql = "DELETE FROM `{$tableName}` WHERE {$where}";

        return self::$DbConnect->query($sql);
    }
    function QueryPaging($tableName, $where, $pageIndex, $pageNumber, &$totalRows, $colums = null)
    {
        $select = "*";
        if ($colums != null) {
            $columsName = implode("`,`", $colums);
            $select = "`{$columsName}`";
        }
        $sql = "SELECT {$select} FROM `{$tableName}` WHERE {$where}";
        if (isset($_GET["debug"])) {
            echo $sql;
        }
        if (self::$debug == true) {
            echo $sql;
        }
        $result = self::$DbConnect->query($sql);
        if (self::$debug == true) {
            // echo "result_mysql";
            var_dump($result);
        }

        if ($result == false) {
            $totalRows = 0;
            return null;
        }
        if ($result->num_rows == 0) {
            $totalRows = 0;
            return null;
        }
        // tổng so dòng trả về
        $totalRows = $result->num_rows;
        $start = ($pageIndex - 1) * $pageNumber;
        $sql = $sql . " limit {$start},{$pageNumber}";
        return self::$DbConnect->query($sql);
    }

    public function WhereEq($columname, $value)
    {
        return " `{$columname}` = '{$value}' ";
    }
    public function WhereLike($columname, $value, $f = "%", $l = "%")
    {
        return " `{$columname}` like '{$f}{$value}{$l}'";
    }
    public function WhereOr($where)
    {
        return " or {$where} ";
    }
    public function WhereInArray($columname, $listValue)
    {
        $strIn = implode("','", $listValue);
        $whereIn = "`{$strIn}'";
        return " `{$columname}` in ({$whereIn})";
    }
    public function WhereAnd($where)
    {
        return " and {$where} ";
    }
    public function INSERT($tableName, $data)
    {
        $columns =  array_keys($data);
        $columnsSql = implode("`,`", $columns);
        $dataSql = implode("','", $data);
        $sql = "INSERT INTO `{$tableName}`
        (`{$columnsSql}`) VALUES ('{$dataSql}')";
        if (self::$debug == true) {
            echo $sql;
        }

        return self::$DbConnect->query($sql);
    }
    public function UPDATE($tableName, $data, $where)
    {
        $sqlData = "";
        foreach ($data as $colums => $dataColums) {
            $sqlData .= " `{$colums}`='{$dataColums}',";
        }
        $sqlData = substr($sqlData, 0, strlen($sqlData) - 1);
        $sql = "UPDATE `{$tableName}` SET 
         {$sqlData}
        WHERE {$where}";
        if (self::$debug == true) {
            echo $sql;
        }
        return self::$DbConnect->query($sql);
    }
    function SELECTROW($tableName = null, $where)
    {

        $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        $result = self::$DbConnect->query($sql);
        if ($result == false)
            return null;
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
    function SELECTROWS($tableName, $where)
    {
        $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        if (self::$debug == true) {
            echo $sql;
        }
        $result = self::$DbConnect->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
        return null;
    }
    function DELETEDB($tableName, $where)
    {
        $sql = "DELETE FROM `{$tableName}` WHERE {$where}";
        $result = self::$DbConnect->query($sql);
        return $result;
    }
    // lấy du liệu và chuyển qua dang [[Key=>value],[Key=>value]]
    function Select2Options($tableName, $where, $colName)
    {
        $result =  $this->SELECTROWS($tableName, $where);
        if ($result == null) {
            return [];
        }
        $op = [];
        while ($row = $result->fetch_assoc()) {
            $op[$row[$colName[0]]] =  $row[$colName[1]];
        }
        return $op;
    }

    function OrderBy($columName, $isDesc = false)
    {
        $Desc = "ASC";
        if ($isDesc == true) {
            $Desc = "DESC";
        }
        $columnsSql = implode("`,`", $columName);
        return " ORDER BY `{$columnsSql}` {$Desc}";
    }

    public function Limit($start = 0, $number = 10)
    {
        $start = max(0, $start);
        $number = max(1, $number);
        return " Limit {$start},{$number}";
    }
}
