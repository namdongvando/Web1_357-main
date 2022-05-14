<?php

namespace Model\Menu;

use Model\FormRender;
use PFBC\Element\Hidden;
use PFBC\Element\Textarea;
use PFBC\Element\Textbox;

class MenuForm implements IMenuForm
{
    const FormName = 'MenuForm';
    const Properties = ["class" => "form-control"];
    function __construct()
    {
    }
    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Id($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        return new FormRender(new Hidden($name, $val));
    }


    public function GetName($name)
    {
        return self::FormName . "[{$name}]";
    }
    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Name($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Tiêu Đề";
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

    /**
     */
    function GroupName($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Nhóm";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;

        return new FormRender(new Textarea($lable, $name, $properties));
    }
    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Link($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Link";
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
    function STT($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Số Thứ Tự";
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
    function Icon($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Icon";
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
    function CapCha($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Cấp Cha";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;

        return new FormRender(new Textbox($lable, $name, $properties));
    }
}
