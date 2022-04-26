<?php

namespace App;
interface IController
{
    public function index();
    public function post();
    public function put();
    public function detail();
    public function delete();
    public function trash();

}

?>