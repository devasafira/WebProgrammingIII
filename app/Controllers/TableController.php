<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TableModel;

class TableController extends BaseController
{
    public function __construct()
    {
        $this->TableModel = new TableModel();
    }

    public function index()
    {
        $data['tables'] = $this->TableModel->findAll();

        return view('Admin/tablePage', $data);
    }

    public function pilihMeja()
    {
        $inactiveTables = $this->TableModel->where('status', 'Tidak Aktif')->findAll();

        if (empty($inactiveTables)) {
            $data['message'] = 'Meja Penuh';
        } else {
            $data['tables'] = $inactiveTables;
        }

        return view('User/Table/PilihMeja', $data);
    }

    public function placeOrder()
    {
        $tableNumber = $this->request->getPost('table_number');
        $namaPembeli = $this->request->getPost('nama_pembeli');
        $tableModel = new ModelTable();
        $tableModel->activateTable($tableNumber);

        $session = session();
        $session->set([
            'nama_pembeli' => $namaPembeli,
            'table_number' => $tableNumber
        ]);
        return redirect()->to('/pilihmenu');
    }

}
