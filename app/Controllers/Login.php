<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Services;

class Login extends BaseController
{
    public $usersModel;
    public function __construct()
    {
        session();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $cek = $this->usersModel->cek_login($username, $password);

            if (($cek['username'] == $username) && ($cek['password'] == $password)) {
                session()->set('id_user', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('nama', $cek['nama']);
                session()->set('id_profesi', $cek['id_profesi']);
                session()->set('level', $cek['level']);
                session()->setFlashdata('berhasil', 'Username atau password benar');
                return redirect()->to('Pages/index');
            } else {
                session()->setFlashdata('gagal', 'Username atau password salah');
                return redirect()->to(base_url('login'));
            }
        }
        return view('login/index', $data);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
