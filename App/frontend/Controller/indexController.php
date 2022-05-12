<?php

namespace App\frontend\Controller;

use Applications;

class indexController extends Applications
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->setTheme("Eshopper");
        $this->setLayout("Theme/Eshopper/layout_home.phtml");
    }
    function index()
    {
        $this->View();
    }
}
