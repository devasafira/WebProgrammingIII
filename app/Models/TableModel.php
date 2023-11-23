<?php

namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{

    // Tambahkan fungsi untuk menyimpan token QR Code
    public function saveQRCodeToken($userId, $token)
    {
        $this->where('id', $userId)->set(['qr_code_token' => $token])->update();
    }

    // Tambahkan fungsi untuk mendapatkan token QR Code
    public function getQRCodeToken($userId)
    {
        return $this->where('id', $userId)->get()->getRow('qr_code_token');
    }



    protected $table            = 'table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['table_number', 'password', 'status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
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
