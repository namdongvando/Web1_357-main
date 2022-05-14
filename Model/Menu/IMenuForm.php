<?php

namespace Model\Menu;


interface IMenuForm
{
    public function Id($val = null);
    public function Name($val = null);
    public function Link($val = null);
    public function GroupName($val = null);
    public function STT($val = null);
    public function Icon($val = null);
    public function CapCha($val = null);
}
