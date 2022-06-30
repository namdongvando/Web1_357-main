<?php
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(0);

use Model\Common;
use Model\DB;
use Model\Mail\PhpMail;

session_start();
ob_start();
include "./vendor/autoload.php";
spl_autoload_register(function ($className) {
    //echo  "____" . $className . "____";
    $className = str_replace("\\", "/", $className);
    $className = __DIR__ . "/{$className}.php";
    include_once($className);
});
// mat khau: hnibhmpqmrwvweht
// mail: namdong92@gmail.com
PhpMail::$Password = "hnibhmpqmrwvweht";
PhpMail::$Username = "namdong92@gmail.com";
new DB();
// set loại tiền tệ
Common::$TypeMoney = $_SESSION["TypeMoney"] ?? Common::MoneyVND;
//  tat ca request phai chay qua file này
// trừ public
// include("App\backend\Controller\BaseController.php");
// include("App\backend\Controller\danhmucController.php");

// $uri = $_SERVER["REQUEST_URI"];
// // chuyển chuỗi thành mảng string2array
// $a = explode("/", $uri);
// // var_dump($a);
// $ControllerName = $a[1];
// $ActionName = isset($a[2]) ? $a[2] : "";
$app = new Applications();
// $app->setParams($a);
// $app->setControllerName($ControllerName);
// $app->setActionName($ActionName);
$className = "App\\{$app->getModule()}\\Controller\\{$app->getController()}Controller";

$ActionName = $app->getAction();
$classNameFile = str_replace("\\", "/", $className);
$classNameFile = __DIR__ . "/{$classNameFile}.php";
if (file_exists($classNameFile)) {
    // có controller;
    $Controller = new $className();
    // kiem tra action
    if (method_exists($Controller, $ActionName)) {
        // có action
        $Controller->$ActionName();
    } else {
        // action mặc định
        $Controller->index();
    }
} else {
    // không có controller
    // $Controller = new App\frontend\Controller\indexController();
    // $Controller->index();
}
