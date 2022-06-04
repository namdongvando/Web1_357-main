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


class UsersForm implements IUsersForm
{
    const FormName = 'UsersForm';
    const Properties = ["class" => "form-control"];
    function __construct()
    {
    }
    public function GetName($name)
    {
        return self::FormName . "[{$name}]";
    }
    function Id($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        return new FormRender(new Hidden($name, $val));
    }
    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Fullname($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Họ & Tên";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Username($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Tài khoản";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Email($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Email";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $properties["type"] = "email";
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Phone($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "SĐT";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Password($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mật Khẩu";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Password($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Address($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Địa chỉ";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Province($val = null, $id = "", $target = "")
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Tỉnh Thành";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $properties["id"] = $id;
        $properties["class"] = "Ajax_TinhThanh form-control";
        $properties["data-target"] = $target ?? "Ajax_District";
        $tinhThanh = new TinhThanh();
        $tinhThanhs = $tinhThanh->GetByParent2Options(0);
        $options = $tinhThanhs;
        return new FormRender(new Select($lable, $name, $options, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $province
     *
     * @return mixed
     */
    function District($val = null, $province, $id = "")
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Quận Huyện";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $properties["id"] = $id ?? "Id_District";
        $tinhThanh = new TinhThanh();
        $tinhThanhs = $tinhThanh->GetByParent2Options($province);
        $options = $tinhThanhs;
        return new FormRender(new Select($lable, $name, $options, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $district
     *
     * @return mixed
     */
    function Ward($val = null, $district)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Phường Xã";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Textbox($lable, $name, $properties));
    }
}
