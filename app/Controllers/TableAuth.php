<?php

namespace App\Controllers;

use App\Models\TableModel;
use CodeIgniter\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TableAuth extends BaseController
{
    public function generateQRCode()
    {
        // Dapatkan ID pengguna dari sesi atau dari proses otentikasi
        $userId = 1; // Ganti dengan cara Anda mendapatkan ID pengguna

        // Generate token untuk QR Code
        $token = bin2hex(random_bytes(32)); // Sesuaikan dengan cara Anda menghasilkan token

        // Simpan token QR Code ke dalam database
        $tableModel = new TableModel();
        $tableModel->saveQRCodeToken($userId, $token);

        // Generate QR Code
        $qrCode = QrCode::size(300)->generate($token);

        // Tampilkan QR Code atau kirim sebagai respons JSON, sesuai kebutuhan
        return view('auth/generate_qr_code', ['qrCode' => $qrCode]);
    }

    public function verifyQRCode()
    {
        // Dapatkan data dari form atau permintaan
        $token = $this->request->getPost('token');

        // Dekripsi token
        $data = decrypt($token);

        // Dapatkan ID pengguna dari data token
        $userId = $data['id'];

        // Verifikasi token dengan token yang disimpan di dalam database
        $tableModel = new TableModel();
        $storedToken = $tableModel->getQRCodeToken($userId);

        if ($storedToken === $token) {
            // Token valid, lakukan langkah-langkah otentikasi sesuai kebutuhan Anda
            // Misalnya, set sesi pengguna
            // session()->set('user_id', $userId);
            return redirect()->to('/dashboard')->with('success', 'Berhasil login dengan QR Code.');
        } else {
            // Token tidak valid
            return redirect()->to('/login')->with('error', 'Token QR Code tidak valid.');
        }
    }
}
