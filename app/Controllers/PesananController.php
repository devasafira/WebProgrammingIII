<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\RiwayatPesananModel;

class PesananController extends BaseController
{
    protected $PesananModel;

    public function __construct()
    {
        $this->PesananModel = new PesananModel();
        // Sesuaikan dengan namespace dan nama model yang benar
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    public function index()
    {
        // $data['pesanans'] = $this->PesananModel->findAll();
        $data['pesanans'] = $this->PesananModel->countPesananDiproses();
        $data['totalPesanan'] = $this->PesananModel->countPesanan();
        $data['totalPesananSelesai'] = $this->PesananModel->countPesananSelesai();
        $data['totalPesananDibatalkan'] = $this->PesananModel->countPesananDibatalkan();

        return view('Admin/Pesanan/pesananPage', $data);
    }

    public function pesananSelesai($id)
    {
        $namaPembeli = session('nama_pembeli');
        $auth = service('authentication');

        if ($auth->check()) {
            // Dapatkan ID pengguna
            $userId = $auth->id();
            // Dapatkan nama pengguna (username)
            $username = $auth->user()->username;


            $pesananItem = $this->PesananModel->find($id);

            if ($pesananItem) {
                $historyModel = new RiwayatPesananModel();

                $historyModel->save([
                    'tanggal_pembelian' => $pesananItem['tanggal_pemesanan'],
                    'id_table' => $pesananItem['id_table'],
                    'table_number' => $pesananItem['table_number'],
                    'id_menu' => $pesananItem['id_menu'],
                    'nama_pembeli' => $namaPembeli,
                    'pembayaran' => $pesananItem['pembayaran'],
                    'nama_menu' => $pesananItem['nama_menu'],
                    'harga' => $pesananItem['harga'],
                    'jumlah' => $pesananItem['jumlah'],
                    'total' => $pesananItem['total'],
                    'id_admin' => $userId,
                    'nama_admin' => $username,
                ]);

                $this->PesananModel->update($id, ['status' => 'Selesai']);

                return redirect()->back()->with('success', 'Pesanan telah ditandai sebagai selesai');
            } else {
                return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
            }
        } else {
            return redirect()->to('/login')->with('error', 'User not logged in');
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
