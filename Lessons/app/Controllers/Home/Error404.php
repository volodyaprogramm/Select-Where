<?php
namespace App\Controllers\Home;
use Core\View;

class Error404
{
    public function index()
    {
       View::view('Error404');
    }
}