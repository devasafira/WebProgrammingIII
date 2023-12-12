<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{

    public function laporanHarian($date, $month, $year)
    {
        return $this->select('*')
            ->from('riwayat_pesanans')
            ->join('menu', 'menu.id = riwayat_pesanans.id_menu', 'left')
            ->where("DAY(riwayat_pesanans.tanggal_pembelian) = $date")
            ->where("MONTH(riwayat_pesanans.tanggal_pembelian) = $month")
            ->where("YEAR(riwayat_pesanans.tanggal_pembelian) = $year")
            ->get()
            ->getResult();
    }

    protected $table            = 'riwayat_pesanans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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
