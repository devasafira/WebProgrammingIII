<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\RiwayatPesananModel;
use App\Models\MenuModel;

class PesananController extends BaseController
{
    protected $PesananModel;
    protected $MenuModel;
    public function __construct()
    {
        $this->PesananModel = new PesananModel();
        $this->MenuModel = new MenuModel();
        // Sesuaikan dengan namespace dan nama model yang benar
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    public function index()
    {
        $data['pesanans'] = $this->PesananModel->findAll();
        $data['pesanans'] = $this->PesananModel->countPesananDiproses();
        $data['totalPesanan'] = $this->PesananModel->countPesanan();
        $data['totalPesananSelesai'] = $this->PesananModel->countPesananSelesai();
        $data['totalPesananDibatalkan'] = $this->PesananModel->countPesananDibatalkan();

        return view('Admin/Pesanan/pesananPage', $data);
    }

    public function pesananSelesai($id)
    {
        $auth = service('authentication');

        if ($auth->check()) {
            // Dapatkan ID pengguna
            $userId = $auth->id();
            // Dapatkan nama pengguna (username)
            $username = $auth->user()->username;

            $pesananItem = $this->PesananModel->find($id);

            if ($pesananItem) {
                $historyModel = new RiwayatPesananModel();

                // Simpan pesanan ke riwayat
                $historyModel->save([
                    'tanggal_pembelian' => $pesananItem['tanggal_pemesanan'],
                    'id_table' => $pesananItem['id_table'],
                    'table_number' => $pesananItem['table_number'],
                    'id_menu' => $pesananItem['id_menu'],
                    'nama_pembeli' => $pesananItem['nama_pembeli'],
                    'pembayaran' => $pesananItem['pembayaran'],
                    'nama_menu' => $pesananItem['nama_menu'],
                    'harga' => $pesananItem['harga'],
                    'jumlah' => $pesananItem['jumlah'],
                    'total' => $pesananItem['total'],
                    'id_admin' => $userId,
                    'nama_admin' => $username,
                ]);

                // Update status pesanan menjadi 'Selesai'
                $this->PesananModel->update($id, ['status' => 'Selesai']);

                // Kurangkan stok menu
                $menuId = $pesananItem['id_menu'];
                $menuQuantity = $pesananItem['jumlah'];
                $this->decreaseStock($menuId, $menuQuantity);

                return redirect()->back()->with('success', 'Pesanan telah ditandai sebagai selesai');
            } else {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
            }
        } else {
            return redirect()->to('/login')->with('error', 'User not logged in');
        }
    }
    private function decreaseStock($menuId, $quantity)
    {
        $menu = $this->MenuModel->find($menuId);

        if ($menu) {
            $newStock = $menu['stok'] - $quantity;

            // Pastikan stok tidak kurang dari 0
            $newStock = max(0, $newStock);

            // Update stok di tabel menu
            $this->MenuModel->update($menuId, ['stok' => $newStock]);
        }
    }
    public function batalkanPesanan($id)
    {
        $auth = service('authentication');

        if ($auth->check()) {
            $userId = $auth->id();
            $username = $auth->user()->username;

            $pesananItem = $this->PesananModel->find($id);

            if ($pesananItem) {
                // Lakukan logika tambahan jika diperlukan
                // ...

                // Hapus pesanan dari database
                $this->PesananModel->update($id, ['status' => 'Dibatalkan']);

                return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan');
            } else {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Pengguna tidak masuk');
        }
    }
}
