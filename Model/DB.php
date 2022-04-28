<?php

namespace Model;

use mysqli;

class DB extends mysqli
{

    function __construct()
    {
        $this->connect("localhost", "root", "", "banhang");
        // chuyển qua tiếng việt
        $this->set_charset("utf8");
    }

    public function GetByQuery($sql)
    {
        // câu lệnh truy  vấn mysql
        //$sql = "SELECT * FROM `nn_danhmuc` WHERE 1";    

        $result = $this->query($sql);
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
        $strSql = implode("`='", $where);
        $wheresql = "`{$strSql}'";

        $sql = "DELETE FROM `{$tableName}` WHERE {$wheresql}";
        return $this->query($sql);
    }
    function QueryPaging($tableName, $where, $pageIndex, $pageNumber, &$totalRows, $colums = null)
    {
        $select = "*";
        if ($colums != null) {
            $columsName = implode("`,`", $colums);
            $select = "`{$columsName}`";
        }
        $sql = "SELECT {$select} FROM `{$tableName}` WHERE {$where} ";
        $result = $this->query($sql);
        if ($result->num_rows == 0) {
            $totalRows = 0;
            return null;
        }
        // tổng so dòng trả về
        $totalRows = $result->num_rows;
        $start = ($pageIndex - 1) * $pageNumber;
        $sql = $sql . " limit {$start},{$pageNumber}";
        return $this->query($sql);
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
    public function WhereIn($columname, $listValue)
    {
        $strIn = implode("','", $listValue);
        $whereIn = "`{$strIn}'";
        return " `{$columname}`in ({$whereIn})";
    }
    public function WhereAnd($where)
    {
        return " and {$where} ";
    }

}
