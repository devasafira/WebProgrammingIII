<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    public function addToCart($cartData)
    {
        $this->insert($cartData);
    }

    public function getItemByMenuName($namaPembeli, $namaMenu)
    {
        return $this->where('nama_pembeli', $namaPembeli)
            ->where('nama_menu', $namaMenu)
            ->first();
    }

    public function updateCartItem($cartItemId, $newQuantity, $newTotal)
    {
        return $this->update($cartItemId, [
            'jumlah' => $newQuantity,
            'total' => $newTotal,
        ]);
    }

    protected $table            = 'carts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $dateFormat       = 'datetime';
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_pemesanan', 'table_number', 'nama_pembeli', 'id_menu', 'nama_menu', 'harga', 'jumlah', 'total'];

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat    = 'timestamps';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
