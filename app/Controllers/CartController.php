<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\CartModel;

class CartController extends BaseController
{
    public function index()
    {
        // Retrieve cart items from the database
        $cartModel = new CartModel();
        $cartItems = $cartModel->findAll();

        $totalHarga = $this->calculateTotalHarga($cartItems);

        // Menampilkan halaman cart/index.php dengan data keranjang dan total harga
        return view('User/Cart/index', ['cartItems' => $cartItems, 'totalHarga' => $totalHarga]);
    }

    // CartController.php

    public function AddselecteMenu()
    {
        $session = session();
        $namaPembeli = $session->get('nama_pembeli');
        $tableNumber = $session->get('table_number');
        $menuModel = new MenuModel();
        $menuId = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity') ?? 1;

        // Retrieve menu details
        $menu = $menuModel->find($menuId);

        // Check if the item with the same menu name already exists in the cart
        $cartModel = new CartModel();
        $existingCartItem = $cartModel->getItemByMenuName($namaPembeli, $menu['nama_menu']);

        if (!empty($existingCartItem)) {
            // If the item already exists, update the quantity
            $newQuantity = $existingCartItem['jumlah'] + $quantity;
            $totalHarga = $menu['harga'] * $newQuantity;

            // Update the existing item in the cart
            $cartModel->updateCartItem($existingCartItem['id'], $newQuantity, $totalHarga);
        } else {
            // Calculate total price
            $totalHarga = $menu['harga'] * $quantity;

            // Prepare data for the cart
            $cartData = [
                'tanggal_pemesanan' => date('Y-m-d H:i:s'),
                'id_table' => null,
                'table_number' => $tableNumber,
                'nama_pembeli' => $namaPembeli,
                'id_menu' => $menuId,
                'nama_menu' => $menu['nama_menu'],
                'harga' => $menu['harga'],
                'gambar' => $menu['gambar'],
                'jumlah' => $quantity,
                'total' => $totalHarga,
            ];

            // Add the item to the cart
            $cartModel->addToCart($cartData);
        }

        return redirect()->to('/cart');
    }


    // Helper function to calculate total harga
    private function calculateTotalHarga($cartItems)
    {
        $totalHarga = 0;
        foreach ($cartItems as $item) {
            $harga = floatval($item['harga']);
            $jumlah = intval($item['jumlah']);
            $totalHarga += $harga * $jumlah;
        }
        return $totalHarga;
    }

    public function removeItem()
    {
        $cartItemId = $this->request->getPost('cart_item_id');

        $cartModel = new CartModel();
        $cartModel->delete($cartItemId);

        return redirect()->to('/cart')->with('success', 'Item removed successfully');
    }
}
