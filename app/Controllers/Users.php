<?php

namespace App\Controllers;

use App\Models\ProfesiModel;
use App\Models\UsersModel;


class Users extends BaseController
{
    protected $usersModel;
    protected $profesiModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->profesiModel = new ProfesiModel();
    }
    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Hehe..  Login dulu bro!');
            return redirect()->to(base_url('login'));
        }

        $users = $this->usersModel
            ->join('profesi', 'profesi.id_profesi = users.id_profesi')
            ->get()->getResultArray();

        $data = [
            'title' => 'Daftar Pegawai',
            'users' => $users
        ];

        return view('users/index', $data);
    }
    public function create()
    {
        $profesi = $this->profesiModel->findAll();
        $data = [
            'title' => 'Form Tambah Pegawai',
            'profesi' => $profesi,
            'validation' => \Config\Services::validation()
        ];
        return view('users/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/users/create')->withInput()->with('validation', $validation);
        }
        $this->usersModel->save([
            'id_profesi' => $this->request->getVar('profesi'),
            'nama' => $this->request->getVar('nama'),
            'foto' => 'default.png',
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'email' => $this->request->getVar('email'),
            'level' => '3',
            'telfon' => $this->request->getVar('telfon')
        ]);
        session()->setFlashdata('pesan', 'Data Pegawai berhasil ditambahkan!');
        return redirect()->to('/users');
    }
}
