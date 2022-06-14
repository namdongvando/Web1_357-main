<?php

namespace App\frontend\Controller;

use Applications;
use Model\Common;
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
