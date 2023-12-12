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
        // if (!session('isLoggedIn')) {
        //     return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        // }
        
        $data['totalTable'] = $this->TableModel->countTable();
        $data['totalActiveTable'] = $this->TableModel->countActiveTable();
        $data['totalBookingTable'] = $this->TableModel->countBookingTable();

        $data['tables'] = $this->TableModel->findAll();

        return view('Admin/Table/tablePage', $data);
    }


    public function tambahTable()
    {
        return view('Admin/Table/tambahTable');
    }

    public function saveTable()
    {
        $rules = [
            'table_number' => 'required',
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, tampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // Ambil data dari input form
        $table_number = $this->request->getPost('table_number');

        $data = [
            'table_number' => $table_number,
        ];

        $this->TableModel->transStart(); // Start database transaction
        $this->TableModel->insert($data);
        $this->TableModel->transComplete(); // Complete database transaction

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan menu
        return redirect()->to('/tambahTable')->with('success', 'Table berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $this->TableModel->delete($id);
        return redirect()->to('/tableAdmin');
    }

    public function edit($id)
    {
        // Ambil data table berdasarkan ID
        $table = $this->TableModel->find($id);

        // Tampilkan halaman edit menu dengan data menu yang akan diedit
        return view('Admin/Table/editTable', ['table' => $table]);
    }

    public function updateTable($id)
    {
        // Validasi data menu dari form
        $rules = [
            'table_number' => 'required',
        ];
    
        if (!$this->validate($rules)) {
            // Jika validasi gagal, tampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Ambil data dari input form
        $table_number  = $this->request->getPost('table_number');
    
        // Update data menu ke dalam database
        $data = [
            'table_number' => $table_number,
        ];
    
        $this->TableModel->update($id, $data);
    
        // Redirect ke halaman yang sesuai setelah berhasil menyimpan table
        return redirect()->to('/tableAdmin')->with('success', 'Table berhasil diupdate.');
    }

    public function deactivateTable($id)
    {
        $model = new TableModel();
        $model->deactivateTable($id);

        // Tambahkan logika atau pindah ke halaman lain setelah mengubah status
        return redirect()->to('/tableAdmin')->with('success', 'Status table berhasil diubah');
    }

    public function logout($id)
    {
        $TableModel = new TableModel();

        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('id');
        $session->remove('table_number');

        $TableModel->deactivateTable($id);

        
        // Redirect ke halaman setelah logout
        return redirect()->to('/tableAdmin')->with('success', 'Status table berhasil diubah');
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
        $tableModel = new TableModel();
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
