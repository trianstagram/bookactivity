<?php

namespace App\Controllers;

class Report extends BaseController
{
    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Hehe..  Login dulu bro!');
            return redirect()->to(base_url('login'));
        }
        $data = [
            'title' => 'Laporan Buku Harian'
        ];
        return view('report/index', $data);
    }
}
