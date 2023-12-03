<?php

namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{
    // Tambahkan fungsi untuk menyimpan token QR Code
    public function saveQRCodeToken($userId, $token)

    // Untuk Hitung Jumlah Table
    public function countTable()
    {
        return $this->countAll();
    }
    // Hitung Jumlah Table yang berstatus Aktif (Sedang Digunakan Customer)
    public function countActiveTable()
    {
        return $this->where('status', 'Aktif')->countAllResults();
    }
    // Hitung Jumlah Table yang berstatus Dibooking
    public function countBookingTable()
    {
        return $this->where('status', 'Dibooking')->countAllResults();
    }
    // Function untuk menonaktifkan table
    public function deactivateTable($id)
    {
        $this->set(['status' => 'Tidak Aktif'])->where('id', $id)->update();
    }

    public function getActiveTables()
    {
        return $this->where('status', 'active')->findAll();
    }

    public function getInactiveTables()
    {
        return $this->where('status', 'Tidak Aktif')->findAll();
    }

    public function activateTable($tableNumber)
    {
        try {
            $this->where('table_number', $tableNumber)->set(['status' => 'active'])->update();
            return true;
        } catch (\Exception $e) {
            // Handle the error, log it, or return false based on your application's needs.
            return false;
        }
    }

    // public function deactivateTable($tableNumber)
    // {
    //     try {
    //         $this->where('table_number', $tableNumber)->set(['status' => 'Tidak Aktif'])->update();
    //         return true;
    //     } catch (\Exception $e) {
    //         // Handle the error, log it, or return false based on your application's needs.
    //         return false;
    //     }
    // }


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


    // Validation
    protected $validationRules      = [
        // Aturan validasi jika diperlukan, misalnya:
        'table_number' => 'required|is_unique[table.table_number]',
        // 'password'     => 'required|min_length[6]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

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
