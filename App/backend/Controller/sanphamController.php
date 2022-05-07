<?php

namespace App\backend\Controller;

use App\IController;
use Model\SanPham;
use Model\SanPhamForm;

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
        if (isset($_POST[SanPhamForm::FormName])) {
        }

        $this->View();
    }

    /**s
     *
     * @return mixed
     */
    function put()
    {

        $this->View(["Id" => $this->getParams(0)]);
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
