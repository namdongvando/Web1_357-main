<?php

namespace Model\Pages;

use Model\FormRender;
use Model\Options;
use PFBC\Element\File;
use PFBC\Element\Hidden;
use PFBC\Element\Select;
use PFBC\Element\Textarea;
use PFBC\Element\Textbox;

class PagesForm implements IPagesForm
{
    const FormName = 'PagesForm';
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
    function Des($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mô Tả";
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
    function Keyword($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Từ Khóa";
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
    function Alias($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Tiêu đề không dấu";
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
    function Content($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Nội Dung";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $properties["id"] = "content";
        return new FormRender(new Textarea($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Lang($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Ngôn Ngữ";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $options = ["vi" => "Tiếng việt", "en" => "Tiếng Anh"];
        return new FormRender(new Select($lable, $name, $options, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Images($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Hình đại diện";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        return new FormRender(new File($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function RecCreateDate($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Ngày Tạo";
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
    function RecUpdateDate($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Ngày Sửa";
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
    function User($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Tác giả";
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
    function isDelete($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Ẩn Hiện";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $options = ["1" => "Ẩn", "0" => "Hiện"];
        return new FormRender(new Select($lable, $name, $options, $properties));
    }
}
