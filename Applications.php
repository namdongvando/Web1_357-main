<?php
class Applications
{
    public static $ModuleName;
    public static $ControllerName;
    public static $ActionName;
    public static $Params;
    public static $Layout;
    public static $Theme;

    function __construct()
    {
        //var_dump($_SERVER["REQUEST_URI"]);
        // lấy dường dân hiện tại
        $uri = $_SERVER["REQUEST_URI"];
        // phân tích dường dẫn
        $this->InitUri($uri);
    }

    public function setTheme($themeName)
    {
        self::$Theme = $themeName;
    }
    public function setLayout($Layout)
    {
        self::$Layout = $Layout;
    } // tra ve ten module
    public function getModule()
    {
        return self::$ModuleName;
    }
    // tra ve ten6 controller
    public function getController()
    {
        return self::$ControllerName;
    }
    // lay ten6 cua action
    public function getAction()
    {
        return self::$ActionName;
    }


    // phân tích dường dẫn
    public function InitUri($uri)
    {
        $moduleDefaut = "frontend";
        $controllerDefaut = "index";
        $actionDefaut = "index";
        // găn mac dịnh cho các thông số 
        //Modlue,controller,action
        self::$ModuleName = $moduleDefaut;
        self::$ControllerName = $controllerDefaut;
        self::$ActionName = $actionDefaut;
        $a = explode("/", $uri);
        //var_dump($a);
        // kiêm tra dường dẫn có module không?
        // kiểm tra trong thư muc `App` có thư mục nào giống với
        // phần tử thứ  $a[1].
        $ModuleName = $a[1];
        // kiểm tra trong thư muc app có thư muc có tên 
        // là $MoludeName
        // gán giá trị mặc dinh cho module  `backend`
        if ($ModuleName == "") {
            return;
        }
        // 
        // echo "App/{$ModuleName}/";
        if (is_dir("App/{$ModuleName}/")) {
            // có module
            //echo "có modlue";
            self::$ModuleName = $ModuleName;
            if (isset($a[2])) {
                // controller
                if ($a[2] == "") {
                    // dường dẫn kết thúc
                    return;
                }
                // có tên
                self::$ControllerName = $a[2];
            }
            if (isset($a[3])) {
                if ($a[3] == "") {
                    // dường dan đã kết thúc
                    return;
                }
                self::$ActionName = $a[3];
            }
            array_shift($a);
            array_shift($a);
            array_shift($a);
            array_shift($a);
            self::$Params = $a;
            return;
        }
        // không có modlue
        // có thể là controller
        self::$ModuleName = $moduleDefaut;
        $cname = $ModuleName;
        self::$ControllerName = $cname;
        // echo "không có modlue";
        // set action
        if (isset($a[2])) {
            // controller
            if ($a[2] == "") {
                // dường dẫn kết thúc
                return;
            }
            // có tên
            self::$ActionName = $a[2];
        }
        array_shift($a);
        array_shift($a);
        array_shift($a);
        self::$Params = $a;
    }


    public function setParams($uriArray)
    {
        self::$Params = [];
        if (isset($uriArray[3])) {
            array_shift($uriArray);
            array_shift($uriArray);
            array_shift($uriArray);
        }
        self::$Params = $uriArray;
    }

    public function View($data = null)
    {
        // xac dinh layput nao
        // file view la file nao?
        $_Module = self::$ModuleName;
        $_Controller = self::$ControllerName;
        $_Action = self::$ActionName;
        $_Theme = self::$Theme;
        $_Content = "App/{$_Module}/Views/{$_Controller}/{$_Action}.phtml";
        if ($_Theme != null)
            $_Content = "Theme/{$_Theme}/{$_Module}/{$_Controller}/{$_Action}.phtml";

        if (file_exists($_Content) == false) {
            exit("không có file content: {$_Content}");
        }
        // cấu hình linh động cho cac controller
        $_layout = self::$Layout;
        if ($_layout == null) {
            include $_Content;
        } else {
            include $_layout;
        }
    }

    public function getParams($index = null)
    {
        if ($index !== null) {
            if (isset(self::$Params[$index])) {
                return self::$Params[$index];
            }
        }
        return self::$Params;
    }
    public function setControllerName($trlName)
    {
        self::$ControllerName = $trlName;
    }
    public function setActionName($trlName)
    {
        self::$ActionName = $trlName;
    }
}
