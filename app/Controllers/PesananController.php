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
        $data['pesanans'] = $this->PesananModel->findAll();
        $data['totalPesanan'] = $this->PesananModel->countPesanan();
        $data['totalPesananSelesai'] = $this->PesananModel->countPesananSelesai();
        $data['totalPesananDibatalkan'] = $this->PesananModel->countPesananDibatalkan();

        return view('Admin/Pesanan/pesananPage', $data);
    }
}
