<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\CartModel;


class UserController extends BaseController
{
    // Untuk ke Home User
    public function index()
    {
        return view('User/Home/index');
    }
    // Untuk ke Contact User
    public function contact()
    {
        return view('Auth/loginPage');
    }
    // Untuk ke Menu User
    public function menu()
    {
        $MenuModel = new MenuModel();

        // Ambil data menu berdasarkan kategori
        $data['SushiMenus'] = $MenuModel->where('kategori', 'Nigiri Sushi')->findAll();
        $data['RamenMenus'] = $MenuModel->where('kategori', 'Ramen')->findAll();
        $data['DrinkMenus'] = $MenuModel->where('kategori', 'Drinks')->findAll();
        $data['AppertizerMenus'] = $MenuModel->where('kategori', 'Appertizer')->findAll();
        $data['DessertMenus'] = $MenuModel->where('kategori', 'Dessert')->findAll();
        $data['SushiRollMenus'] = $MenuModel->where('kategori', 'Sushi Roll')->findAll();
        

        return view('User/Menu/index', $data);
    }

    public function AddselecteMenu()
    {
        $session = session();
        $namaPembeli = $session->get('nama_pembeli');
        $tableNumber = $session->get('table_number');
        $menuModel = new MenuModel();
        $menuId = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity') ?? 1; // Menggunakan nilai default 1 jika quantity tidak disertakan dalam formulir
    
        // Retrieve menu details
        $menu = $menuModel->find($menuId);
    
        // Prepare data for the cart
        $cartData = [
            'tanggal_pemesanan' => date('Y-m-d H:i:s'),
            'id_table' => null, // You may set the table ID if available
            'table_number' => $tableNumber,
            'nama_pembeli' => $namaPembeli,
            'id_menu' => $menuId,
            'nama_menu' => $menu['nama_menu'],
            'harga' => $menu['harga'],
            'jumlah' => $quantity,
            'total' => $menu['harga'] * $quantity,
        ];
    
        // Check if the menu is already in the cart
        $cartModel = new CartModel();
        $existingCartItem = $cartModel->where('id_menu', $menuId)
                                      ->where('table_number', $tableNumber)
                                      ->first();
    
        if ($existingCartItem) {
            // If menu is already in the cart, update the quantity and total
            $newQuantity = $existingCartItem['jumlah'] + $quantity;
            $cartData['jumlah'] = $newQuantity;
            $cartData['total'] = $menu['harga'] * $newQuantity;
    
            // Update the existing item in the cart
            $cartModel->update($existingCartItem['id'], $cartData);
        } else {
            // If menu is not in the cart, add it as a new item
            $cartModel->insert($cartData);
        }
    
        return redirect()->to('/cart');
    }
    
}
