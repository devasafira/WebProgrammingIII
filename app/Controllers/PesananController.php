<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Cart;
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
    public function menu()
    {
        $menuModel = new MenuModel();

        // Mengambil data menu dari database
        $sushiMenus = $menuModel->findAll();

        // Menampilkan halaman Uboard.php dengan data menu
        return view('Menu/menu', ['sushiMenus' => $sushiMenus]);
    }

    public function AddselecteMenu()
    {
        $session = session();
        $namaPembeli = $session->get('nama_pembeli');
        $tableNumber = $session->get('table_number');
        $menuModel = new MenuModel();
        $menuId = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity');

        // Mengambil data menu berdasarkan ID
        $menu = $menuModel->find($menuId);

        // Simpan data menu dan quantity ke dalam session keranjang
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$menuId])) {
            // Jika menu sudah ada dalam keranjang, tambahkan quantity
            $totalHarga = 0;
            foreach ($cart as $item) {
                $harga = floatval($item['harga']);
                $jumlah = intval($item['jumlah']);
                $totalHarga += $harga * $jumlah;
            }
        } else {
            // Jika menu belum ada dalam keranjang, tambahkan data baru
            $cart[$menuId] = [
                'gambar' => $menu['gambar'],
                'nama_produk' => $menu['nama_produk'],
                'harga' => $menu['harga'],
                'jumlah' => $quantity,
            ];
        }

        // Simpan kembali session keranjang
        session()->set('cart', $cart);
        return redirect()->to('/menu');
    }

   
}
