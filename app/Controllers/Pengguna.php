<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
    protected $penggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $tb_user =  $this->penggunaModel->findAll();

        $data = [
            'tb_user' => $tb_user,
            'users' => $query->getResult(),
        ];

        echo view('templates/header');
        echo view('pengguna/index', $data);
        echo view('templates/footer');
    }

    public function tambah()
    {
        $tb_user =  $this->penggunaModel->findAll();

        $data = [
            'tb_user' => $tb_user,
        ];

        echo view('templates/header');
        echo view('pengguna/create', $data);
        echo view('templates/footer');
    }

    public function simpan()
    {
        if (!$this->validate([

            'namaPengguna' => 'required|is_unique[users.username]',
            'Email' => 'required|is_unique[users.email]'

        ])) {

            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('register')->withInput()->with('validation', $validation);
        }

        $this->penggunaModel->save([
            'email' => $this->request->getVar('Email'),
            'username' => $this->request->getVar('namaPengguna')
        ]);

        session()->setFlashdata('berhasil', 'Data Berhasil Edit.');

        return redirect('pengguna');
    }

    public function edit($usersid)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'users' => $this->penggunaModel->getUsers($usersid)
        ];

        echo view('templates/header');
        echo view('pengguna/edit', $data);
        echo view('templates/footer');
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        // cek Nama

        $dataLama = $this->penggunaModel->find($id);

        $email = $this->request->getVar('Email');
        $username = $this->request->getVar('namaPengguna');

        $ruleEmail = $dataLama['email'] == $email ? 'required' : "required|is_unique[users.email,email,{$dataLama['email']},id,{$id}]";
        $ruleUsername = $dataLama['username'] == $username ? 'required' : "required|is_unique[users.username,username,{$dataLama['username']},id,{$id}]";

        $validation->setRules([
            'Email' => [
                'rules' => $ruleEmail,
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'is_unique' => 'Email sudah terdaftar.'
                ]
            ],
            'namaPengguna' => [
                'rules' => $ruleUsername,
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah ada'
                ]
            ],
        ]);
        // dd($this->request->getVar());

        if ($validation->withRequest($this->request)->run()) {
        } else {
            return redirect()->to('pengguna/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        $this->penggunaModel->save([
            'id' => $this->request->getVar('dummy'),
            'email' => $this->request->getVar('Email'),
            'username' => $this->request->getVar('namaPengguna')
        ]);

        session()->setFlashdata('berhasil', 'Data Berhasil Edit.');

        return redirect('pengguna');
    }

    public function delete($usersid)
    {

        $this->penggunaModel->delete($usersid);

        session()->setFlashdata('berhasil', 'Data Berhasil Dihapus.');

        return redirect('pengguna');
    }
}
