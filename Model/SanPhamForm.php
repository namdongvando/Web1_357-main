<?php

namespace Model;

use PFBC\Element;
use PFBC\Element\File;
use PFBC\Element\Hidden;
use PFBC\Element\Select;
use PFBC\Element\Textarea;
use PFBC\Element\Textbox;

class SanPhamForm  implements ISanPhamForm
{
    const FormName = "Form_SanPham";
    const Properties = ["class" => "form-control"];
    /**
     */
    function __construct()
    {
    }
    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Id($value = null)
    {
        $name = $this->GetName("Id");
        return new FormRender(new Hidden($name, $value));
    }
    public function GetName($name)
    {
        return self::FormName . "[{$name}]";
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Code($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mã Hàng Hóa";
        $properties["placeholder"] = $lable;
        $properties["required"] = "true";
        $properties["value"] = $value;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function IdDM($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Danh Mục Hàng Hóa";
        $properties["required"] = "true";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        $options = DanhMuc::Get2Option();
        return new FormRender(new Select($lable, $name, $options, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Name($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Tên Hàng Hóa";
        $properties["required"] = "true";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Decription($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Mô Tả";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Price($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Giá Bán";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Keyword($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Từ Khóa Tìm Kiếm";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Title($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Tiêu Đề";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Content($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Nội Dung";
        $properties["placeholder"] = $lable;
        $properties["id"] = "content";
        $properties["value"] = $value;
        return new FormRender(new Textarea($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function UrlImages($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Hình";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new File($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function SalePrice($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Giá Cũ";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new Textbox($lable, $name, $properties));
    }

    /**
     *
     * @param mixed $value
     *
     * @return mixed
     */
    function Active($value = null)
    {
        $name = $this->GetName(__FUNCTION__);
        $properties = self::Properties;
        $lable = "Ẩn/Hiện";
        $properties["placeholder"] = $lable;
        $properties["value"] = $value;
        return new FormRender(new Select($lable, $name, [1 => "Hiện", 0 => "Ẩn"], $properties));
    }
}
