<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('User/Home/index');
    }

    public function contact()
    {
        return view('Auth/loginPage');
    }
}
