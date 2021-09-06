<?php
namespace App\Controllers\Admin;
use Core\View;

abstract class Main
{
    public function head()
    {
        View::view('Main');

    }
}
//Для работы роутера!!!