<?php

namespace App\backend\Controller;

use App\IController;
use Model\Common;
use Model\Options\OptionsForm;
use Model\Options;

class optionsController extends indexController implements IController
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
        if (isset($_POST[OptionsForm::FormName])) {
            $postData = $_POST[OptionsForm::FormName];
            $st = new Options();
            $st->Post($postData);
            Common::ToUrl("/backend/options");
        }

        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        if (isset($_POST[OptionsForm::FormName])) {
            // lấy từ form
            $postData = $_POST[OptionsForm::FormName];
            // láy từ database
            $st = new Options();
            $stDB = $st->GetById($postData["Id"]);
            $stDB["Name"] = $postData["Name"];
            $stDB["Code"] = $postData["Code"];
            $stDB["Description"] = $postData["Description"];
            $st->Put($stDB);
            Common::ToUrl("/backend/options");
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
