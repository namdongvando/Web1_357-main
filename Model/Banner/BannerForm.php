<?php

namespace Model\Banner;

use Model\FormRender;
use Model\Banner;
use Model\Options;
use PFBC\Element\File;
use PFBC\Element\Hidden;
use PFBC\Element\Select;
use PFBC\Element\Textarea;
use PFBC\Element\Textbox;

class BannerForm implements IBannerForm
{
    const FormName = 'BannerForm';
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
    function GroupsName($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Nhóm";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $properties["id"] = "SelectGroupName";
        $op = new Options();
        $options = $op->GetByGroupName2Options("BannerGroupName");
        $options1 = ["" => "Chọn Banner"];
        $options = $options1 + $options;

        return new FormRender(new Select($lable, $name, $options, $properties));
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
    function UrlImages($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Chọn hình";
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
    function Description($val = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Nội Dung";
        $properties["placeholder"] = $lable;
        $properties["value"] = $val;
        $properties["id"] = "content";

        return new FormRender(new Textarea($lable, $name, $properties));
    }
}
