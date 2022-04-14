<?php 
namespace App\payment\Controller;

use Applications;

class indexController extends Applications 
{
    public function __construct()
    {
        $this->setLayout("Theme/admintheme/layout_admin.phtml");  
    } 
    public function index()
    { 
      
        $this->View();
    }
    
}

?>