<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\UsersModel;
use Config\Services;

class Pages extends BaseController
{


    protected $bukuModel;
    protected $userModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->userModel = new UsersModel();
    }
    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Hehe..  Login dulu bro!');
            return redirect()->to(base_url('login'));
        }
        $id = session()->get('id_user');
        $tanggal = mktime(date('m'), date("d"), date('Y'));
        $tahun = date("Y", $tanggal);
        $bulan = date("m", $tanggal);
        $count = $this->bukuModel->countMonthly($bulan, $tahun, $id);
        $targets = $this->userModel->getTargetProfesi($id);
        foreach ($count as $a) :
            $hasil = $a['hasil'];
        endforeach;
        foreach ($targets as $t) :
            $target = $t['target'];
        endforeach;
        $res = $hasil - $target;
        $data = [
            'title' => 'Buku Harian | Puskesmas Mlati II',
            'act' => $hasil,
            'res' => $res,
            'target' => $target

        ];
        echo view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me | Puskesmas Mlati II'
        ];
        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = ['title' => 'Contact Us | Puskesmas Mlati II', 'alamat' => [
            [
                'tipe' => 'Kantor',
                'alamat' => 'Jl. Cabakan, Sumberadi, Mlati, Sleman',
                'provinsi' => 'DIY'
            ]
        ]];

        return view('pages/contact', $data);
    }
}
