<?php

namespace Model\Options;

use Model\FormRender;
use PFBC\Element\Hidden;
use PFBC\Element\Textarea;
use PFBC\Element\Textbox;

class OptionsForm implements IOptionsForm
{
    const FormName = 'OptionsForm';
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

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Code($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mã Tùy Chọn";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new Textbox($lable, $name, $properties));
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
        $lable = "Tên Tùy Chọn";
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
    function Description($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mô Tả";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        // $properties["id"] = "content";

        return new FormRender(new Textarea($lable, $name, $properties));
    }
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
}
