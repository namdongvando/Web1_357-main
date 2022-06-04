<?php

namespace Model\Users;

interface IUsersForm
{
    public function Id($val = null);
    public function Fullname($val = null);
    public function Username($val = null);
    public function Email($val = null);
    public function Phone($val = null);
    public function Password($val = null);
    public function Address($val = null);
    public function Province($val = null);
    public function District($val = null, $province);
    public function Ward($val = null, $district);
}
