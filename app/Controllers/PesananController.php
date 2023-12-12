<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\MenuModel;
use App\Models\PesananModel;
use App\Models\RiwayatPesananModel;

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

    public function pesananSelesai($id)
    {
        $auth = service('auth');

        if ($auth->check()) {
            // Dapatkan ID pengguna
            $userId = $auth->id();
            // Dapatkan nama pengguna (username)
            $username = $auth->getUsername();

            $pesananItems = $this->PesananModel->find($id);

            if ($pesananItems) {
                $historyModel = new RiwayatPesananModel();

                foreach ($pesananItems as $pesananItem) {
                    $historyModel->save([
                        'tanggal_pembelian' => $pesananItems['tanggal_pemesanan'],
                        'id_table' => $pesananItems['id_table'],
                        'table_number' => $pesananItems['table_number'],
                        'id_menu' => $pesananItems['id_menu'],
                        'pembayaran' => $pesananItems['pembayaran'],
                        'nama_menu' => $pesananItems['nama_menu'],
                        'harga' => $pesananItems['harga'],
                        'jumlah' => $pesananItems['jumlah'],
                        'total' => $pesananItems['total'],
                        'id_admin' => $userId,
                        'nama_admin' => $username,
                    ]);


                    $this->PesananModel->delete($id);
                }

                return redirect()->back()->with('success', 'Pesanan telah ditandai sebagai selesai');
            }
        } else {
            echo "User not logged in";
        }
    }
}
