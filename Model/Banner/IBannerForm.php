<?php

namespace Model\Banner;


interface IBannerForm
{
    public function Id($val = null);
    public function Name($val = null);
    public function Link($val = null);
    public function UrlImages($val = null);
    public function Description($val = null);
    public function GroupName($val = null);
    public function STT($val = null);
}
