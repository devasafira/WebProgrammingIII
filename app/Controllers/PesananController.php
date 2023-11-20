<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\MenuModel;
use App\Models\PesananModel;

class PesananController extends BaseController
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->MenuModel = new MenuModel();
        $this->PesananModel = new PesananModel();

    }

    public function index()
    {
        if (!session('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
        
        $data['pesanans'] = $this->PesananModel->findAll();

        return view('Admin/pesananPage', $data);
    }
}
