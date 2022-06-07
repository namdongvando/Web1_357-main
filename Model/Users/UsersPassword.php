<?php

namespace Model\Users;

use Model\FormRender;
use Model\Menu;
use Model\TinhThanh;
use Model\Users\IUsersForm;
use PFBC\Element\Hidden;
use PFBC\Element\Password;
use PFBC\Element\Select;
use PFBC\Element\Textarea;
use PFBC\Element\Textbox;


class UsersPassword
{
    const FormName = 'UsersPassword';
    const Properties = ["class" => "form-control"];
    function __construct()
    {
    }
    public function GetName($name)
    {
        return self::FormName . "[{$name}]";
    }

    public function password($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mật khẩu";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Password($lable, $name, $properties));
    }
    public function repassword($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Nhập lại mật khẩu";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Password($lable, $name, $properties));
    }
    public function newpassword($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mật khẩu mới";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Password($lable, $name, $properties));
    }
}
