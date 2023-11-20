<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\MenuModel;
use App\Models\PesananModel;
use App\Models\TableModel;

class TableController extends BaseController
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->MenuModel = new MenuModel();
        $this->PesananModel = new PesananModel();
        $this->TableModel = new TableModel();
    }

    public function index()
    {
        // if (!session('isLoggedIn')) {
        //     return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        // }
        
        $data['tables'] = $this->TableModel->findAll();

        return view('Admin/tablePage', $data);
    }
}
