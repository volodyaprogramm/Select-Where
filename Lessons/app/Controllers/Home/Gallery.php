<?php
namespace App\Controllers\Home;


use App\Controllers\AbstractControllers;
use App\Model\Gallery as ModelAbout;

class Gallery extends AbstractControllers

{
    public function keyone()
    {
        $funget = new ModelAbout();
        $this->gener('Galerry',$funget->getAllTitle());
    }

}