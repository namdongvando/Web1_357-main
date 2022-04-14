<?php

use Model\DB;

include("Model/DB.php");
$DB = new DB();
$result = $DB->GetByQuery("");
?>
<table border="1">
    <tr>
        <td>action</td>
        <td>Mã</td>
        <td>Tên</td>
        <td>Mô Tả</td>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        // var_dsump($row);
        echo <<<DM
        <tr>
            <td></td>
            <td>{$row["Id"]}</td>
            <td>{$row["Name"]}</td>
            <td>{$row["Decription"]}</td>
        </tr>
DM;
    }

    ?>
</table>