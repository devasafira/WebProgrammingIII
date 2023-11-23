<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{

    public function getMenu()
    {
        return $this->db->findAll('menu');
    }

    public function countMenu()
    {
        return $this->countAll();
    }

    public function sumTotalStok()
    {
        return $this->selectSum('stok')->get()->getRow()->stok;
    }

    public function simpanData($data = null)
    {
        $this->db->insert('menu', $data);
    }

    public function deleteData($id)
    {
        return $this->where('id', $id)->delete();
    }


    protected $table            = 'menu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_menu', 'kategori', 'harga', 'stok', 'gambar'];

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
