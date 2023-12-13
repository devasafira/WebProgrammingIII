<?php

namespace App\Models;

use CodeIgniter\Model;


class CartModel extends Model
{
    // public static function calculateTotal($userId)
    // {
    //     return self::where('id_table', $userId)->sum('total');
    // }

    // Tambahkan metode untuk memperbarui kuantitas pada keranjang
    // public function updateQuantity($cartId, $newQuantity)
    // {
    //     $cart = $this->find($cartId);

    //     if ($cart) {
    //         // Hitung ulang subtotal
    //         $newSubtotal = $cart['harga'] * $newQuantity;

    //         // Update kuantitas dan subtotal
    //         return $this->set(['jumlah' => $newQuantity, 'total' => $newSubtotal])->where('id', $cartId)->update();
    //     }

    //     return false;
    // }

    public function clearCartForUser($id)
    {
        return $this->where('id_table', $id)
            ->delete();
    }

    public function getCartDataForUser($userId)
    {
        return $this->where('id_table', $userId)
            ->findAll();
    }

    public function calculateTotal($userId)
    {
        return $this->selectSum('total')->where('id_table', $userId)->get()->getRow()->total;
    }
    

    protected $table            = 'carts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_pemesanan', 'id_table', 'table_number', 'nama_pembeli', 'id_menu', 'nama_menu', 'harga', 'jumlah', 'total'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
