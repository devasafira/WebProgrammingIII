<?php

namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{
<<<<<<< Updated upstream

    // Tambahkan fungsi untuk menyimpan token QR Code
    public function saveQRCodeToken($userId, $token)
=======
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
>>>>>>> Stashed changes
    {
        $this->where('id', $userId)->set(['qr_code_token' => $token])->update();
    }

    // Tambahkan fungsi untuk mendapatkan token QR Code
    public function getQRCodeToken($userId)
    {
        return $this->where('id', $userId)->get()->getRow('qr_code_token');
    }


<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes

    protected $table            = 'table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['table_number', 'password', 'status'];

<<<<<<< Updated upstream
    // Dates
=======
>>>>>>> Stashed changes
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

<<<<<<< Updated upstream
    // Validation
    protected $validationRules      = [];
=======
    protected $validationRules      = [
        // Aturan validasi jika diperlukan, misalnya:
        'table_number' => 'required|is_unique[table.table_number]',
        // 'password'     => 'required|min_length[6]',
    ];
>>>>>>> Stashed changes
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
