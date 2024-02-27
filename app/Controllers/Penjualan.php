<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PelangganModel;
use App\Models\PenjualanModel;
use App\Models\TransaksiModel;

class Penjualan extends BaseController
{

    protected $produkModel;
    protected $pelangganModel;
    protected $transaksiModel;
    protected $penjualanModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->pelangganModel = new PelangganModel();
        $this->transaksiModel = new TransaksiModel();
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $tb_produk =  $this->produkModel->findAll();
        $tb_pelanggan =  $this->pelangganModel->findAll();
        // $tb_detailpenjualan =  $this->transaksiModel->findAll();

        $model = new PenjualanModel();

        $data = [
            'tb_produk' => $tb_produk,
            'tb_pelanggan' => $tb_pelanggan,
            // 'tb_pelanggan' => $tb_detailpenjualan,

            'tb_penjualan' => $model->getPenjualanDetail(),

        ];

        $totalHarga = array_sum(array_column($data['tb_penjualan'], 'subtotal'));
        $data['total_harga'] = $totalHarga;

        echo view('templates/header');
        echo view('penjualan/index', $data);
        echo view('templates/footer');
    }

    public function tambah()
    {

        $data = [
            'validation' => \Config\Services::validation()
        ];

        echo view('templates/header');
        echo view('produk/create', $data);
        echo view('templates/footer');
    }

    public function simpan()
    {
        $produkID = $this->request->getPost('produk');
        $jumlahproduk = $this->request->getPost('jumlahproduk');
        $pelangganID = $this->request->getPost('pelanggan');

        $jumlahproduk = (int) $jumlahproduk;
        $hargaProduk = (float) $this->produkModel->getHargaProduk($produkID);
        $subtotal = $hargaProduk * $jumlahproduk;

        $penjualanData = [
            'tanggal_penjualan' => date('Y-m-d H:i:s'),
            'PelangganID' => $pelangganID,
            // Tambahkan informasi lain yang diperlukan
        ];

        $penjualanId = $this->penjualanModel->insert($penjualanData, true);

        $transaksiData = [
            'PenjualanID' => $penjualanId, // Asumsi ada kolom yang menghubungkan transaksi ke penjualan
            'ProdukID' => $produkID,
            'jumlah_produk' => $jumlahproduk,
            'subtotal' => $subtotal,
        ];

        $this->transaksiModel->save($transaksiData);

        // // Simpan data pelanggan
        // $pelangganId = $this->penjualanModel->insert([
        //     'PelangganID' => $this->request->getVar('pelanggan'),
        // ], true);

        // // Simpan data produk
        // $produkId = $this->transaksiModel->insert([
        //     'ProdukID' => $this->request->getVar('produk'),
        //     'jumlah_produk' => $this->request->getVar('jumlahproduk'),
        // ], true);

        // // Simpan data transaksi
        // $this->transaksiModel->save([
        //     'PelangganID' => $pelangganId,
        //     'ProdukID' => $produkId,
        //     'subtotal' => $subtotal,
        // ]);

        return redirect()->to('penjualan');
    }

    public function delete($penjualanid)
    {

        $this->penjualanModel->delete($penjualanid);


        return redirect('penjualan');
    }
}
