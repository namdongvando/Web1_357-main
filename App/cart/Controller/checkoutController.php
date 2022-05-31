<?php

namespace App\cart\Controller;

use Applications;

class checkoutController extends Applications
{

    public function __construct()
    {
        $this->setTheme("Eshopper");
        $this->setLayout("Theme/Eshopper/layout_cart.phtml");
    }
    public function index()
    {
        $this->View();
    }
}
