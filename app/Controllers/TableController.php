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
        $data['tables'] = $this->TableModel->findAll();

        return view('Admin/tablePage', $data);
    }

    public function pilihMeja()
    {
        // Menggunakan property $this->TableModel yang sudah diinisialisasi di constructor
        $inactiveTables = $this->TableModel->where('status', 'inactive')->findAll();

        if (empty($inactiveTables)) {
            $data['message'] = 'Meja Penuh'; // Set message when no inactive tables available
        } else {
            $data['tables'] = $inactiveTables;
        }

        return view('User/Table/PilihMeja', $data);
    }
}
