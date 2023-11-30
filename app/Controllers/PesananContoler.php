<?php
namespace App\Controller;

use App\Models\ModelPesanan;
use App\Models\ModelMenu;

public function pesanan()
    {
        $MenuModel = new ModelMenu();

        // Mengambil data menu dari database
        $sushiMenus = $menuModel->findAll();

        // Menampilkan halaman Uboard.php dengan data menu
        return view('user/Uboard', ['sushiMenus' => $sushiMenus]);
    }
?>