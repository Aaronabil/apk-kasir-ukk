<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $tb_produk =  $this->produkModel->findAll();
        $totalProduk = $this->produkModel->countAll();

        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $request = service('request');
        $searchData = $request->getGet();

        $search = "";
        if (isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        // Get data 
        $users = new ProdukModel();

        if ($search == '') {
            $paginateData = $users->paginate(5, 'tb_produk');
        } else {
            $paginateData = $users->select('*')
                ->orLike('namaProduk', $search)
                ->orLike('hargaBeli', $search)
                ->orLike('hargaJual', $search)
                ->orLike('stok', $search)
                ->paginate(5, 'tb_produk');
        }


        $data = [
            'tb_produk' => $tb_produk,
            'totalProduk' => $totalProduk,
            'users' => $paginateData,
            'pager' => $users->pager,
            'search' => $search,
            'currentPage' => $currentPage,
            'produk' => $this->produkModel->paginate(1),
            'pager' => $this->produkModel->pager
            // 'harga_beli' => str_replace('.', '', $this->request->getPost('hargaBeli')),
        ];

        echo view('templates/header');
        echo view('produk/index', $data);
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
        $validation = \Config\Services::validation();
        $HargaBeli = $this->request->getPost('hargaBeli');


        if ($this->request->getMethod() === 'post') {
            $rules = [
                'namaProduk' => [
                    'rules' => 'required|is_unique[tb_produk.nama_produk]',
                    'errors' => [
                        'required' => 'Nama produk harus diisi.',
                        'is_unique' => 'Produk sudah tersedia.'
                    ]
                ],
                'hargaBeli' => [
                    'rules' => 'required|is_natural_no_zero|min_length[3]',
                    'errors' => [
                        'required' => 'Harga beli harus diisi.',
                        'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka',
                        'min_length' => 'Angka harus lebih dari 2'
                    ]
                ],
                'hargaJual' => [
                    'rules' => "required|is_natural_no_zero|greater_than_equal_to[$HargaBeli]",
                    'errors' => [
                        'required' => 'Harga jual harus diisi.',
                        'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka',
                        'greater_than_equal_to' => 'Harga jual harus lebih tinggi dari harga beli.'
                    ]
                ],
                'stok' => [
                    'rules' => 'required|is_natural_no_zero',
                    'errors' => [
                        'required' => 'Stock harus diisi.',
                        'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka dan harus lebih dari 0'
                    ]
                ],
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to('produk/create')->withInput()->with('errors', $validation->getErrors());
            }
        }

        // {

        //     $validation = \Config\Services::validation();
        //     // dd($validation);
        //     return redirect()->to('produk/create')->withInput()->with('validation', $validation);
        // }

        $this->produkModel->save([
            'nama_produk' => $this->request->getVar('namaProduk'),
            'harga_beli' => $this->request->getVar('hargaBeli'),
            'harga_jual' => $this->request->getVar('hargaJual'),
            'stock' => $this->request->getVar('stok'),
        ]);

        session()->setFlashdata('berhasil', 'Data Berhasil Ditambahkan.');

        return redirect('produk');
    }

    public function edit($produkid)
    {

        $tb_produk = $this->produkModel->getProduk($produkid);

        if ($tb_produk) {
            $tb_produk['harga_beli'] = floor(floatval($tb_produk['harga_beli']));
            $tb_produk['harga_jual'] = floor(floatval($tb_produk['harga_jual']));

            // $tb_produk['harga_beli'] = round($tb_produk['harga_beli']);
            // $tb_produk['harga_jual'] = round($tb_produk['harga_jual']);
        }

        $data = [
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkModel->getProduk($produkid),
            'produk' => $tb_produk,
            // 'harga_beli' => str_replace('.', '', $this->request->getPost('hargaBeli')),

        ];

        echo view('templates/header');
        echo view('produk/edit', $data);
        echo view('templates/footer');
    }

    public function update($ProdukID)
    {
        $validation = \Config\Services::validation();
        // cek Nama

        $produkLama = $this->produkModel->find($ProdukID);
        $namaProduk = $this->request->getVar('namaProduk');
        $HargaBeli = $this->request->getPost('hargaBeli');

        // if ($produkLama['nama_produk'] == $this->request->getVar('namaProduk')) {
        $ruleNama = $produkLama['nama_produk'] == $namaProduk ? 'required' : "required|is_unique[tb_produk.nama_produk,ProdukID,{$ProdukID}]";
        //     $ruleNama = 'required';
        // } else {
        //     $ruleNama = 'required|is_unique[tb_produk.nama_produk]';
        // }
        // dd($this->request->getVar());

        $validation->setRules([
            'namaProduk' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => 'Nama produk harus diisi.',
                    'is_unique' => 'Produk sudah tersedia.'
                ]
            ],
            'hargaBeli' => [
                'rules' => 'required|is_natural_no_zero|min_length[3]',
                'errors' => [
                    'required' => 'Harga beli harus diisi.',
                    'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka',
                    'min_length' => 'Angka harus lebih dari 2'
                ]
            ],
            'hargaJual' => [
                'rules' => "required|is_natural_no_zero|greater_than_equal_to[$HargaBeli]",
                'errors' => [
                    'required' => 'Harga jual harus diisi.',
                    'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka',
                    'greater_than_equal_to' => 'Harga jual harus lebih tinggi dari harga beli.'
                ]
            ],
            'stok' => [
                'rules' => 'required|is_natural_no_zero',
                'errors' => [
                    'required' => 'Stock harus diisi.',
                    'is_natural_no_zero' => 'Kolom ini hanya boleh berisi angka dan harus lebih dari 0'
                ]
            ],
        ]);
        if ($validation->withRequest($this->request)->run()) {
        } else {
            return redirect()->to('produk/edit/' . $ProdukID)->withInput()->with('errors', $validation->getErrors());
        }


        // if (!$this->validate([

        //     'namaProduk' => $ruleNama,
        //     'hargaBeli' => 'required|is_natural_no_zero',
        //     'hargaJual' => 'required|is_natural_no_zero',
        //     'stok' => 'required|is_natural_no_zero',

        // ])) 
        // {

        //     $validation = \Config\Services::validation();
        //     // dd($validation);
        //     return redirect()->to('produk/edit/' . $ProdukID)->withInput()->with('validation', $validation);
        // }

        $this->produkModel->save([
            'ProdukID' => $this->request->getVar('dummy'),
            'nama_produk' => $this->request->getVar('namaProduk'),
            'harga_beli' => $this->request->getVar('hargaBeli'),
            // 'harga_beli' => str_replace('.', '', ('harga_beli')),
            'harga_jual' => $this->request->getVar('hargaJual'),
            'stock' => $this->request->getVar('stok')
        ]);

        session()->setFlashdata('berhasil', 'Data Berhasil Edit.');

        return redirect('produk');
    }

    public function delete($produkid)
    {

        $this->produkModel->delete($produkid);

        session()->setFlashdata('berhasil', 'Data Berhasil Dihapus.');

        return redirect('produk');
    }
}
