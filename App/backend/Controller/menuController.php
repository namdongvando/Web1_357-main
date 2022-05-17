<?php

namespace App\backend\Controller;

use App\IController;
use Model\Common;
use Model\Menu\MenuForm;
use Model\Menu;

class menuController extends indexController implements IController
{
    /**
     */
    function __construct()
    {
        // kiểm tra đăng nhập từ lớp indexController
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
        if (isset($_POST[MenuForm::FormName])) {
            $postData = $_POST[MenuForm::FormName];
            $st = new Menu();
            $postData["CapCha"] = intval($postData["CapCha"]);
            $st->Post($postData);
            Common::ToUrl("/backend/menu");
        }

        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        if (isset($_POST[MenuForm::FormName])) {
            // lấy từ form
            $postData = $_POST[MenuForm::FormName];
            // láy từ database
            $st = new Menu();
            $stDB = $st->GetById($postData["Id"]);
            $postData["CapCha"] = intval($postData["CapCha"]);
            foreach ($postData as $key => $value) {
                $stDB[$key] = $value;
            }
            $st->Put($stDB);
        }
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
