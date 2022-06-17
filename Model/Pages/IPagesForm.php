<?php

namespace Model\Pages;


interface IPagesForm
{
    public function Id($val = null);
    public function Name($val = null);
    public function Des($val = null);
    public function Keyword($val = null);
    public function Alias($val = null);
    public function Content($val = null);
    public function Lang($val = null);
    public function Images($val = null);
    public function RecCreateDate($val = null);
    public function RecUpdateDate($val = null);
    public function User($val = null);
    public function isDelete($val = null);
}
