<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\MenuModel;

class MenuController extends BaseController
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->MenuModel = new MenuModel();
    }

    public function index()
    {
        // if (!session('isLoggedIn')) {
        //     return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        // }

        $data['menus'] = $this->MenuModel->findAll();

        return view('Admin/Menu/menuPage', $data);
    }

    public function tambahMenu()
    {
        return view('Admin/Menu/tambahMenuPage');
    }

    public function saveMenu()
    {
        // Validasi data menu dari form
        $rules = [
            'kategori' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => [
                'uploaded[gambar]',
                'mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'max_size[gambar,2048]'
            ]
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, tampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // Ambil data dari input form
        $kategori  = $this->request->getPost('kategori');
        $namaMenu = $this->request->getPost('nama_menu');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');
        $gambar = $this->request->getFile('gambar');

        // Pindahkan file gambar yang diunggah ke folder yang diinginkan
        if ($gambar->move(ROOTPATH . 'public/uploads')) {
            // Simpan data menu ke dalam database
            $data = [
                'kategori' => $kategori,
                'nama_menu' => $namaMenu,
                'harga' => $harga,
                'stok' => $stok,
                'gambar' => $gambar->getName()
            ];

            $this->MenuModel->transStart(); // Start database transaction
            $this->MenuModel->insert($data);
            $this->MenuModel->transComplete(); // Complete database transaction

            // Redirect ke halaman yang sesuai setelah berhasil menyimpan menu
            return redirect()->to('/tambahMenu')->with('success', 'Menu berhasil ditambahkan.');
        } else {
            // Handle the case where the file move operation failed
            $errors = $gambar->getErrors();
            return redirect()->back()->withInput()->with('file_error', $errors);
        }
    }

    public function delete($id)
    {
        $this->MenuModel->delete($id);
        return redirect()->to('/menuAdmin');
    }

    public function edit($id)
    {
        // Cek apakah pengguna sudah login
        // if (!session('isLoggedIn')) {
        //     return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        // }

        // Ambil data menu berdasarkan ID
        $menu = $this->MenuModel->find($id);

        // Tampilkan halaman edit menu dengan data menu yang akan diedit
        return view('Admin/Menu/editMenu', ['menu' => $menu]);
    }

    public function updateMenu($id)
    {
        // Validasi data menu dari form
        $rules = [
            'kategori' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
        ];
    
        if (!$this->validate($rules)) {
            // Jika validasi gagal, tampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Ambil data dari input form
        $kategori  = $this->request->getPost('kategori');
        $namaProduk = $this->request->getPost('nama_menu');
        $harga = $this->request->getPost('harga');
        $gambar = $this->request->getFile('gambar');
    
        // Cek apakah ada file gambar yang diunggah
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Pindahkan file gambar yang diunggah ke folder yang diinginkan
            $gambar->move(ROOTPATH . 'public/uploads');
        } else {
            // Jika tidak ada gambar baru diunggah, ambil nama gambar yang ada di database
            $menu = $this->MenuModel->find($id);
            $gambar = $menu['gambar'];
        }
    
        // Update data menu ke dalam database
        $data = [
            'kategori' => $kategori,
            'nama_menu' => $namaProduk,
            'harga' => $harga,
            'gambar' => $gambar // Simpan nama file gambar ke database
        ];
    
        $this->MenuModel->update($id, $data);
    
        // Redirect ke halaman yang sesuai setelah berhasil menyimpan menu
        return redirect()->to('/menuAdmin')->with('success', 'Menu berhasil diupdate.');
    }

}
