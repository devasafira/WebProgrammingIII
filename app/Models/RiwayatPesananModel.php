<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPesananModel extends Model
{
    protected $table            = 'riwayatpesanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_pembelian', 'nama_pembeli', 'id_table', 'table_number', 'id_menu', 'nama_menu', 'harga', 'jumlah', 'total', 'id_admin', 'nama_admin'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'timestamps';
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
