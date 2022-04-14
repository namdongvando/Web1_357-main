<?php
var_dump($_POST);
$user = $_POST["user"];
try {
    if ($user["Name"] == "") {
        throw new Exception("Bạn Chưa Nhận Họ & Tên");
    }
    if ($user["BOD"] == "") {
        throw new Exception("Bạn Chưa Nhận Ngày Sinh");
    }
    if ($user["Username"] == "") {
        throw new Exception("Bạn Chưa Nhận Tài Khoản");
    }
    if ($user["Password"] == "") {
        throw new Exception("Bạn Chưa Nhận Password");
    }
    if ($user["Email"] == "") {
        throw new Exception("Bạn Chưa Nhận Email");
    }
    if (!filter_var($user["Email"], FILTER_VALIDATE_EMAIL))
    {
        throw new Exception("Email Không Đúng Định Dạng");
    }
// them tai khoan vao database
} catch (Exception $e) {
    echo $e->getMessage(); 
    header("Location: dangky.php?e={$e->getMessage()}");

}
