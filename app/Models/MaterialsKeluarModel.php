<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialsKeluarModel extends Model
{
    public function getAllRecords()
    {
        return $this->orderBy('tanggal', 'DESC')->findAll();
    }

    public function getAllRecordsPerYear($selectedYear)
    {
        return $this->select('id, tanggal, bahan, jumlah')
            ->where('YEAR(tanggal)', $selectedYear)
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    public function getLaporanFiltered($selectedMonth, $selectedYear)
    {
        return $this->select('id, tanggal, bahan, jumlah')
            ->where('MONTH(tanggal)', $selectedMonth)
            ->where('YEAR(tanggal)', $selectedYear)
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    protected $table            = 'materials_keluar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal', 'bahan', 'jumlah'];

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
