<?php

namespace Model\Options;


interface IOptionsForm
{
    public function Id($val = null);
    public function Code($val = null);
    public function Name($val = null);
    public function Description($val = null);
    public function GroupName($val = null);
}
