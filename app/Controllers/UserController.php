<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\PesananModel;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->PesananModel = new PesananModel();
    }
    // Untuk ke Home User
    public function index()
    {
        $isLoggedIn = session()->get('isLoggedIn');
        
        // Jika sudah login, ambil nama pengguna
        $data['table_number'] = ($isLoggedIn) ? session()->get('table_number') : '';

        return view('User/Home/index', $data);
    }
    // Untuk ke Contact User
    public function contact()
    {
        return view('User/Contact/index');
    }
    // Untuk ke Menu User
    public function menu()
    {
        $isLoggedIn = session()->get('isLoggedIn');
        
        // Jika sudah login, ambil nama pengguna
        $data['table_number'] = ($isLoggedIn) ? session()->get('table_number') : '';
        
        $MenuModel = new MenuModel();

        // Ambil data menu berdasarkan kategori
        $data['SushiMenus'] = $MenuModel->where('kategori', 'Nigiri Sushi')->findAll();
        $data['RamenMenus'] = $MenuModel->where('kategori', 'Ramen')->findAll();
        $data['DrinkMenus'] = $MenuModel->where('kategori', 'Drinks')->findAll();
        

        return view('User/Menu/index', $data);
    }

    public function statusPesanan()
    {
        $isLoggedIn = session()->get('isLoggedIn');
        $userId = session('id');

        $data['table_number'] = ($isLoggedIn) ? session()->get('table_number') : '';
        $data['pesanans'] = $this->PesananModel->getDataForUser($userId);

        return view('User/Cart/statusPesanan', $data);

    }
}
