<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\Database\BaseBuilder;

class PenjualanModel extends Model
{
    protected $table            = 'tb_penjualan';
    protected $primaryKey       = 'PenjualanID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps    = false;
    protected $allowedFields    = ['PenjualanID', 'tanggal_penjualan', 'total_harga', 'PelangganID'];

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

    public function getPenjualanDetail()
    {
        $builder = $this->db->table($this->table);

        // $builder->select('tb_penjualan.tanggal_penjualan, tb_pelanggan.nama_pelanggan AS namaPelanggan, tb_produk.nama_produk AS namaProduk, tb_detailpenjualan.jumlah_produk, tb_detailpenjualan.subtotal');
        // $builder->join('tb_pelanggan', 'tb_penjualan.PelangganID = tb_pelanggan.PelangganID');
        // $builder->join('tb_detailpenjualan', 'tb_penjualan.PenjualanID = tb_detailpenjualan.PenjualanID');
        // $builder->join('tb_produk', 'tb_detailpenjualan.ProdukID = tb_produk.ProdukID');

        $builder->select('
        tb_penjualan.tanggal_penjualan,
        tb_pelanggan.nama_pelanggan AS namaPelanggan,
        tb_produk.nama_produk AS namaProduk,
        tb_detailpenjualan.jumlah_produk AS jumlahProduk,
        tb_detailpenjualan.subtotal AS subtotal,
        tb_penjualan.total_harga AS totalHarga
        ');
        $builder->join('tb_pelanggan', 'tb_penjualan.PelangganID = tb_pelanggan.PelangganID', 'left');
        $builder->join('tb_detailpenjualan', 'tb_penjualan.PenjualanID = tb_detailpenjualan.PenjualanID', 'left');
        $builder->join('tb_produk', 'tb_detailpenjualan.ProdukID = tb_produk.ProdukID', 'left');


        return $builder->get()->getResultArray();
    }

    public function getPenjualan($penjualanid = false)
    {

        if ($penjualanid == false) {
            return $this->findAll();
        }

        return $this->where(['PenjualanID' => $penjualanid])->first();
    }
}
