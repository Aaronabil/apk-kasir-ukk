<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\Database\BaseBuilder;

class ProdukModel extends Model
{
    protected $table            = 'tb_produk';
    protected $primaryKey       = 'ProdukID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['ProdukID', 'nama_produk', 'harga_beli', 'harga_jual', 'stock'];

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

    public function getProduk($produkid = false)
    {

        if ($produkid == false) {
            return $this->findAll();
        }

        return $this->where(['ProdukID' => $produkid])->first();
    }

    public function getHargaProduk($id)
    {
        $produk = $this->find($id);
        return is_array($produk) && isset($produk['harga_jual']) ? $produk['harga_jual'] : null;
    }
}
