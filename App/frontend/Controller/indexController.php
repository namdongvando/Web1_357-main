<?php

namespace App\frontend\Controller;

use Applications;
use Model\Common;
use Model\Pages;
use Model\SanPham;
use Model\Setting;

class indexController extends Applications
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $setting = new Setting();
        $themeName = $setting->GetByCode("ThemeName");
        $this->setTheme($themeName["Description"]);
        $this->setLayout("Theme/{$themeName["Description"]}/layout_home.phtml");
    }
    function index()
    {
        $this->View();
    }
    public function sanpham()
    {
        $sp = new SanPham($this->getParams(0));
        $this->View(["product" => $sp]);
    }
    public function pages()
    {
        $sp = new Pages($this->getParams(0));
        // var_dump($sp->Content());
        $this->View(["Pages" => $sp]);
    }
    // /index/setmoney/[Loại tiền tệ]
    function setmoney()
    {
        if ($_SESSION["TypeMoney"] == Common::MoneyVND) {
            $_SESSION["TypeMoney"] = Common::MoneyDola;
            Common::ToUrl("/");
            return;
        }
        $_SESSION["TypeMoney"] = Common::MoneyVND;
        Common::ToUrl("/");
    }
}
