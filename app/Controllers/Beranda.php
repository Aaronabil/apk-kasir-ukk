<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PelangganModel;
use App\Models\PenggunaModel;

class Beranda extends BaseController
{

    protected $produkModel;
    protected $pelangganModel;
    protected $penggunaModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->pelangganModel = new PelangganModel();
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        $tb_produk =  $this->produkModel->findAll();
        $totalProduk = $this->produkModel->countAll();
        $totalPelanggan = $this->pelangganModel->countAll();
        $totalPengguna = $this->penggunaModel->countAll();

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $tb_user =  $this->penggunaModel->findAll();

        $data = [
            'tb_produk' => $tb_produk,
            'totalProduk' => $totalProduk,
            'totalPelanggan' => $totalPelanggan,
            'totalPengguna' => $totalPengguna,
            'tb_user' => $tb_user,
            'users' => $query->getResult(),
        ];

        echo view('templates/header');
        echo view('menuUtama', $data);
        echo view('templates/footer');
    }
}
