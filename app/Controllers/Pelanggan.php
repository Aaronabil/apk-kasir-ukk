<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelangganModel;
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $tb_pelanggan =  $this->pelangganModel->findAll();

        $data = [
            'tb_pelanggan' => $tb_pelanggan,
        ];

        echo view('templates/header');
        echo view('pelanggan/index', $data);
        echo view('templates/footer');
    }
    public function tambah()
    {

        $data = [
            'validation' => \Config\Services::validation()
        ];

        echo view('templates/header');
        echo view('pelanggan/create', $data);
        echo view('templates/footer');
    }

    public function simpan()
    {

        $validation = \Config\Services::validation();


        if ($this->request->getMethod() === 'post') {
            $rules = [
                'namaPelanggan' => [
                    'rules' => 'required|is_unique[tb_pelanggan.nama_pelanggan]',
                    'errors' => [
                        'required' => 'Nama pelanggan harus diisi.',
                        'is_unique' => 'Pelanggan sudah terdaftar.'
                    ]
                ],
                'Alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat harus diisi.',
                    ]
                ],
                'nomorTelepon' => [
                    'rules' => 'required|is_unique[tb_pelanggan.nomor_telepon]|max_length[13]|min_length[11]',
                    'errors' => [
                        'required' => 'Nomor telepon harus diisi.',
                        'is_unique' => 'Nomor telepon sudah terdaftar.',
                        'max_length' => 'Jumlah angka nomor telepon tidak boleh lebih dari 13 angka.',
                        'min_length' => 'Jumlah angka nomor telepon harus lebih dari 10 angka.'
                    ]
                ],
            ];


            if (!$this->validate($rules)) {
                session()->setFlashdata('errors', $validation->getErrors());
                return redirect()->to('pelanggan/create')->withInput()->with('errors', $validation->getErrors());
            }



            // dd($validation);
            // return redirect()->to('pelanggan/create')->withInput()->with('validation', $validation);
        }

        $this->pelangganModel->save([
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('Alamat'),
            'nomor_telepon' => $this->request->getVar('nomorTelepon')
        ]);

        session()->setFlashdata('berhasil', 'Data Berhasil Ditambahkan.');

        return redirect('pelanggan');
    }

    public function edit($pelangganid)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'pelanggan' => $this->pelangganModel->getPelanggan($pelangganid)
        ];

        echo view('templates/header');
        echo view('pelanggan/edit', $data);
        echo view('templates/footer');
    }

    public function update($PelangganID)
    {

        $validation = \Config\Services::validation();

        $dataLama = $this->pelangganModel->find($PelangganID);

        $namaPelanggan = $this->request->getVar('namaPelanggan');
        $noTelepon = $this->request->getVar('noTelepon');
        // cek Nama

        $ruleNama = $dataLama['nama_pelanggan'] == $namaPelanggan ? 'required' : "required|is_unique[tb_pelanggan.nama_pelanggan,nama_pelanggan,{$dataLama['nama_pelanggan']},PelangganID,{$PelangganID}]";

        $ruleNo = $dataLama['nomor_telepon'] == $noTelepon ? 'required' : "required|is_unique[tb_pelanggan.nomor_telepon,nomor_telepon,{$dataLama['nomor_telepon']},PelangganID,{$PelangganID}]|max_length[13]|min_length[11]";

        // dd($this->request->getVar());

        $validation->setRules([
            'namaPelanggan' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => 'Nama pelanggan harus diisi.',
                    'is_unique' => 'Pelanggan sudah terdaftar.'
                ]
            ],
            'Alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'noTelepon' => [
                'rules' => $ruleNo,
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                    'is_unique' => 'Nomor telepon sudah terdaftar.',
                    'max_length' => 'Jumlah angka nomor telepon tidak boleh lebih dari 13 angka.',
                    'min_length' => 'Jumlah angka nomor telepon harus lebih dari 10 angka.'
                ]
            ],
        ]);
        if ($validation->withRequest($this->request)->run()) {
        } else {
            return redirect()->to('pelanggan/edit/' . $PelangganID)->withInput()->with('errors', $validation->getErrors());
        }

        $this->pelangganModel->save([
            'PelangganID' => $this->request->getVar('dummy'),
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('Alamat'),
            'nomor_telepon' => $this->request->getVar('noTelepon')
        ]);

        session()->setFlashdata('berhasil', 'Data Berhasil Edit.');

        return redirect('pelanggan');
    }

    public function delete($pelangganid)
    {

        $this->pelangganModel->delete($pelangganid);

        session()->setFlashdata('berhasil', 'Data Berhasil Dihapus.');

        return redirect('pelanggan');
    }
}
