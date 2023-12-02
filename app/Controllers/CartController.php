<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CartController extends BaseController
{
    public function index()
    {
        return view('User/Cart/index');
    }
}
