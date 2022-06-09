<?php

namespace App\cart\Controller;

use App\backend\Controller\indexController;
use Applications;
use Exception;
use Model\Common;
use Model\DB;
use Model\GioHang;
use Model\Order;
use Model\OrderDetail;
use Model\User;

class cartmanageController extends indexController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->View();
    }
    public function pages()
    {
        $path = "public/pagesCartSuccess.html";
        // luu file 
        if (isset($_POST["Content"])) {
            file_put_contents($path, $_POST["Content"]);
        }
        // doc noi dung 
        $content = file_get_contents($path);
        $this->View(['content' => $content]);
    }
    public function danhsachdonhang()
    {

        $this->View();
    }
}
