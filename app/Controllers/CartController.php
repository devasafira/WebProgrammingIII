<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\TableModel;
use App\Models\CartModel;
use App\Models\PesananModel;
use App\Models\MenuModel;

class CartController extends BaseController
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->MenuModel = new MenuModel();
        $this->TableModel = new TableModel();
        $this->CartModel = new CartModel();
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
        $isLoggedIn = session()->get('isLoggedIn');
        $userId = session('id');

        $cartId = $this->request->getPost('id');
        $newQuantity = $this->request->getPost('jumlah');

        // $cartModel = new CartModel();
        // $cartModel->updateQuantity($cartId, $newQuantity);

        // Cek jika sudah Login
        if ($isLoggedIn) {
            $data['table_number'] = ($isLoggedIn) ? session()->get('table_number') : '';
            $data['id'] = ($isLoggedIn) ? session()->get('id') : '';
            $data['carts'] = $this->CartModel->getCartDataForUser($userId);
            $data['totalKeseluruhan'] = $this->CartModel->calculateTotal($userId);

            return view('User/Cart/index', $data);
        } else {
            return redirect()->to('/')->with('message', 'Scan Barcode Login Terlebih Dahulu!');
        }
    }

    public function logout($id)
    {
        $TableModel = new TableModel();
        $CartModel = new CartModel();

        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('id');
        $session->remove('table_number');
        $session->remove('nama_pembeli');

        $TableModel->deactivateTable($id);
        $CartModel->clearCartForUser($id);


        return redirect()->to('/home')->with('message', 'Berhasil Logout');
    }

    public function addToCart($id, $jumlah = 1)
{
    // Pastikan pengguna telah login dan dapat mengambil user_id dari sesi atau metode otentikasi yang digunakan
    $userId = session('id');
    $namaPembeli = session('nama_pembeli');
    $tableNumber = session('table_number');

    // Cek apakah produk tersedia dalam database
    $productModel = new MenuModel();
    $menu = $productModel->find($id);

    if (!$menu) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan');
    }

    // Cek apakah produk sudah ada di keranjang, jika iya, update jumlahnya
    $cartModel = new CartModel();
    $existingCartItem = $cartModel->getItemByMenuName($namaPembeli, $menu['nama_menu']);

    if ($existingCartItem) {
        $newQuantity = $existingCartItem['jumlah'] + $jumlah;
        $cartModel->update($existingCartItem['id'], [
            'jumlah' => $newQuantity,
            'total' => $menu['harga'] * $newQuantity,
        ]);

        session()->setFlashdata('success', 'Jumlah produk di keranjang berhasil diperbarui.');
    } else {
        // Jika produk belum ada di keranjang, tambahkan
        $cartModel->save([
            'tanggal_pemesanan' => date("Y-m-d H:i:s"),
            'id_table' => $userId,
            'nama_pembeli' => $namaPembeli,
            'table_number' => $tableNumber, // assuming 'table_number' is stored in the session
            'id_menu' => $id,
            'nama_menu' => $menu['nama_menu'], // assuming 'nama_menu' is a field in your MenuModel
            'harga' => $menu['harga'], // assuming 'harga' is a field in your MenuModel
            'jumlah' => $jumlah,
            'total' => $menu['harga'] * $jumlah, // calculate total based on harga and jumlah
        ]);

        session()->setFlashdata('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Menghitung total keseluruhan dan menyimpannya dalam sesi
    $totalKeseluruhan = $cartModel->calculateTotal($userId);
    session()->set('totalKeseluruhan', $totalKeseluruhan);

    return redirect()->to('/cart');
}


    public function processOrder()
    {
        $isLoggedIn = session()->get('isLoggedIn');
        $userId = session('id');
        $namaPembeli = session('nama_pembeli');

        $payment = $this->request->getPost('pembayaran');
        
        if ($isLoggedIn) {
            // Ambil semua item di keranjang berdasarkan user ID
            $cartModel = new CartModel();
            $cartItems = $cartModel->getCartDataForUser($userId);

            // Pastikan ada item di keranjang sebelum membuat pesanan
            if ($cartItems) {
                // Buat objek model untuk pesanan
                $pesananModel = new PesananModel();

                // Loop melalui setiap item di keranjang dan tambahkan ke pesanan
                foreach ($cartItems as $cartItem) {
                    $pesananModel->save([
                        'tanggal_pemesanan' => date("Y-m-d H:i:s"),
                        'id_table' => $cartItem['id_table'],
                        'table_number' => $cartItem['table_number'],
                        'id_menu' => $cartItem['id_menu'],
                        'nama_pembeli' => $namaPembeli,
                        'pembayaran' => $payment,
                        'nama_menu' => $cartItem['nama_menu'],
                        'harga' => $cartItem['harga'],
                        'jumlah' => $cartItem['jumlah'],
                        'total' => $cartItem['total'],
                    ]);

                    // Hapus item dari keranjang setelah ditambahkan ke pesanan
                    $cartModel->delete($cartItem['id']);
                }

                // Redirect atau berikan respons JSON sesuai kebutuhan
                return redirect()->to('/statusPesanan')->with('success', 'Pesanan berhasil dibuat');
            } else {
                return redirect()->to('/cart')->with('error', 'Keranjang kosong, tambahkan item terlebih dahulu');
            }
        } else {
            return redirect()->to('/')->with('message', 'Scan Barcode Login Terlebih Dahulu!');
        }
    }
     public function removeItem()
    {
        $cartItemId = $this->request->getPost('cart_item_id');

        $cartModel = new CartModel();
        $cartModel->delete($cartItemId);

        return redirect()->to('/cart')->with('success', 'Item removed successfully');
    }
}
