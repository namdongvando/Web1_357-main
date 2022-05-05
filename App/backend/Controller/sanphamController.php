<?php

namespace App\backend\Controller;

use App\IController;

class sanphamController extends indexController implements IController
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->View();
    }
    /**
     *
     * @return mixed
     */
    function post()
    {
    }

    /**s
     *
     * @return mixed
     */
    function put()
    {
    }

    /**
     *
     * @return mixed
     */
    function detail()
    {
    }

    /**
     *
     * @return mixed
     */
    function delete()
    {
    }

    /**
     *
     * @return mixed
     */
    function trash()
    {
    }
}
