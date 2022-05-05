<?php

namespace Model;

interface ISanPhamForm
{
    public function Id($value = null);
    public function Code($value = null);
    public function IdDM($value = null);
    public function Name($value = null);
    public function Decription($value = null);
    public function Price($value = null);
    public function Keyword($value = null);
    public function Title($value = null);
    public function Content($value = null);
    public function UrlImages($value = null);
    public function SalePrice($value = null);
    public function Active($value = null);
}
