<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    public function getUser()
    {
        return $this->db->get('admin');
    }

    public function simpanData($data = null)
    {
        $this->db->insert('admin', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('admin', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('admin', $where);
    }






    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password'];

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
