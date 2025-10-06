<?php

namespace Src\Interfaces\Home\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view('welcome');
    }
}
