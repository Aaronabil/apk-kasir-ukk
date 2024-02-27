<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\Database\BaseBuilder;

class TransaksiModel extends Model
{
    protected $table            = 'tb_detailpenjualan';
    protected $primaryKey       = 'DetailID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['DetailID', 'PenjualanID', 'ProdukID', 'jumlah_produk', 'subtotal'];

    // Dates

    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    //Callbacks
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
