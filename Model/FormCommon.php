<?php

namespace Model;

use PFBC\Element\Select;

class FormCommon
{
    const Properties = ["class" => "form-control"];
    static function Province($name, $val = null, $id = "", $target = "")
    {
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
    static  function District($name, $val = null, $province, $id = "")
    {

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
}
