<?php

namespace App\backend\Controller;

use Model\Mail\PhpMail;

// backend/mail/index
class mailController extends indexController
{
    /**
     */
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        PhpMail::SendMailHttp("abc gì đó", "123", "a34", ["vandovodoi1992@gmail.com"]);
    }
}
