<?php
session_start();
ob_start();
include "./vendor/autoload.php";
spl_autoload_register(function ($className) {
    //echo  "____" . $className . "____";
    include_once(__DIR__ . "/{$className}.php");
});
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
// echo $className;
if (file_exists($className . ".php")) {
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
    $Controller = new App\backend\Controller\indexController();
    $Controller->index();
}


// echo $_GET["v"];

use App\backend\Controller\BaseController;
use App\backend\Controller\danhmucController;

// echo "_index.php_";
// $baseCtrl = new BaseController();
// $baseCtrl->index();
// $baseCtrl = new danhmucController();
// $baseCtrl->index();
