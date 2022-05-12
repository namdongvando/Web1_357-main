<?php

namespace Model\Setting;


interface ISettingForm
{
    public function Id($val = null);
    public function Code($val = null);
    public function Name($val = null);
    public function Description($val = null);
}
