<?php 

namespace App\Controller;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function menu () {
        $menuModel = new ModelMenu();
        // Ambil data menu berdasarkan kategori
        $data['sushiMenus'] = $menuModel->where('kategori', 'Sushi')->findAll();
        $data['sashimiMenus'] = $menuModel->where('kategori', 'Sashimi')->findAll();
        $data['chinmiMenus'] = $menuModel->where('kategori', 'Chinmi')->findAll();
        $data['udonMenus'] = $menuModel->where('kategori', 'Udon')->findAll();
        $data['drinksMenus'] = $menuModel->where('kategori', 'Drinks')->findAll();

        return view('Menu/Menu', $data);
    }

    public function tesmenu (){

        return view('Menu/menu');
    }
}
