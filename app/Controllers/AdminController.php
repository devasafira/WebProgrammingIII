<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        return view('Admin/pesananPage');
    }

    public function menu(){
        return view('Admin/menuPage');
    }

    public function table(){
        return view('Admin/tablePage');
    }
}
