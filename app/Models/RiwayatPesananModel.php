<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPesananModel extends Model
{
    
    public function getTotalPembelianPerMenu($selectedMonth, $selectedYear)
    {
        return $this->select('nama_menu, SUM(jumlah) as total_pembelian')
            ->where('MONTH(tanggal_pembelian)', $selectedMonth)
            ->where('YEAR(tanggal_pembelian)', $selectedYear)
            ->groupBy('nama_menu')
            ->orderBy('total_pembelian', 'DESC')
            ->findAll();
    }

    public function getTotalPembelianPerMenuYear($selectedYear)
    {
        return $this->select('nama_menu, SUM(jumlah) as total_pembelian')
            ->where('YEAR(tanggal_pembelian)', $selectedYear)
            ->groupBy('nama_menu')
            ->orderBy('total_pembelian', 'DESC')
            ->findAll();
    }

    public function getTotalPembelianPerMenuAll()
    {
        return $this->select('nama_menu, SUM(jumlah) as total_pembelian')
            ->groupBy('nama_menu')
            ->orderBy('total_pembelian', 'DESC')
            ->findAll();
    }
    // public function getTotalPembelianPerMenu($selectedMonth, $selectedYear)
    // {
    //     return $this->select('nama_menu, SUM(jumlah) as total_pembelian')
    //         ->where('MONTH(tanggal_pembelian)', $selectedMonth)
    //         ->where('YEAR(tanggal_pembelian)', $selectedYear)
    //         ->groupBy('nama_menu')
    //         ->orderBy('total_pembelian', 'DESC')
    //         ->get()
    //         ->getResult();
    // }

    public function getMostSoldMenu($selectedMonth, $selectedYear)
    {
        return $this->select('nama_menu, SUM(jumlah) as total_pembelian')
            ->where('MONTH(tanggal_pembelian)', $selectedMonth)
            ->where('YEAR(tanggal_pembelian)', $selectedYear)
            ->groupBy('nama_menu')
            ->orderBy('total_pembelian', 'DESC')
            ->first();
    }

    public function getAllRecordsPerYear($selectedYear)
    {
        return $this->select('id, tanggal_pembelian, id_menu, nama_menu, jumlah')
            ->where('YEAR(tanggal_pembelian)', $selectedYear)
            ->orderBy('tanggal_pembelian', 'DESC')
            ->findAll();
    }

    public function getAllRecords()
    {
        return $this->orderBy('tanggal_pembelian', 'DESC')->findAll();
    }

    public function getLaporanPenjualan($selectedMonth, $selectedYear)
    {
        return $this->select('id, tanggal_pembelian, id_menu, nama_menu, jumlah')
            ->where('MONTH(tanggal_pembelian)', $selectedMonth)
            ->where('YEAR(tanggal_pembelian)', $selectedYear)
            ->orderBy('tanggal_pembelian', 'DESC')
            ->findAll();
    }

    protected $table            = 'riwayat_pesanans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal_pembelian', 'nama_pembeli', 'id_table', 'pembayaran', 'table_number', 'id_menu', 'nama_menu', 'harga', 'jumlah', 'total', 'id_admin', 'nama_admin'];

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
