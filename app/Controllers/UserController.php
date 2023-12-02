<?php

namespace App\Controllers;

use App\Models\MenuModel;

class UserController extends BaseController
{
    // Untuk ke Home User
    public function index()
    {
        return view('User/Home/index');
    }
    // Untuk ke Contact User
    public function contact()
    {
        return view('Auth/loginPage');
    }
    // Untuk ke Menu User
    public function menu()
    {
        $MenuModel = new MenuModel();

        // Ambil data menu berdasarkan kategori
        $data['SushiMenus'] = $MenuModel->where('kategori', 'Nigiri Sushi')->findAll();
        $data['RamenMenus'] = $MenuModel->where('kategori', 'Ramen')->findAll();
        $data['DrinkMenus'] = $MenuModel->where('kategori', 'Drinks')->findAll();
        

        return view('User/Menu/index', $data);
    }
}
