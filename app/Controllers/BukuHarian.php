<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;

class BukuHarian extends BaseController
{
    protected $bukuModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Hehe..  Login dulu bro!');
            return redirect()->to(base_url('login'));
        }
        $id = session()->get('id_user');
        $showBuku = $this->bukuModel->showDaily($id);
        $data = [
            'title' => 'Buku Harian Pegawai',
            'buku' => $showBuku
        ];
        return view('bukuharian/index', $data);
    }
    public function detail($id_bh)
    {
        $showBuku = $this->bukuModel->showDetail($id_bh);
        $data = [
            'title' => 'Buku Harian Pegawai',
            'buku' => $showBuku
        ];
        return view('bukuharian/detail', $data);
    }
    public function create()
    {
        // $kategori = $this->kategoriModel->findAll();
        $id = session()->get('id_profesi');
        $kategori = $this->kategoriModel->kategori_profesi($id);
        $data = [
            'title' => 'Form Tambah Kegiatan',
            'kategori' => $kategori,
            'validation' => \Config\Services::validation()
        ];
        return view('bukuharian/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'kegiatan' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/bukuharian/create')->withInput()->with('validation', $validation);
        }

        $awal = strtotime($this->request->getVar('mulai'));
        $akhir = strtotime($this->request->getVar('selesai'));
        $diff = $akhir - $awal;
        $interval = floor($diff / 60);
        $id = session()->get('id_user');
        $this->bukuModel->save([
            'id_users' => $id,
            'kegiatan' => $this->request->getVar('kegiatan'),
            'kategori' => $this->request->getVar('kategori'),
            'qty' => $this->request->getVar('jumlah'),
            'tag' => $this->request->getVar('tag'),
            'tanggal' => $this->request->getVar('tgl'),
            'jam_mulai' => $this->request->getVar('mulai'),
            'jam_selesai' => $this->request->getVar('selesai'),
            'interval' => $interval,
            'status' => $this->request->getVar('status'),
            'status_buku' => 'draft'
        ]);

        session()->setFlashdata('pesan', 'Data Kegiatan kamu telah berhasil ditambahkan!');
        return redirect()->to('/bukuharian');
    }
    public function delete($id)
    {
        $this->bukuModel->delete($id);
        session()->setFlashdata('hapus', 'Data Kegiatan kamu telah terhapus!');
        return redirect()->to('/bukuharian');
    }
    public function edit($id)
    {
        $id_u = session()->get('id_profesi');
        $kategori = $this->kategoriModel->kategori_profesi($id_u);
        $getActivity = $this->bukuModel->showRowDaily($id);
        $data = [
            'title' => 'Form Edit Kegiatan',
            'kategori' => $kategori,
            'validation' => \Config\Services::validation(),
            'buku' => $getActivity
        ];
        return view('bukuharian/edit', $data);
    }
    public function update($id)
    {
        $awal = strtotime($this->request->getVar('mulai'));
        $akhir = strtotime($this->request->getVar('selesai'));
        $diff = $akhir - $awal;
        $interval = floor($diff / 60);
        $id_u = session()->get('id_user');
        $this->bukuModel->save([
            'id_bh' => $id,
            'id_users' => $id_u,
            'kegiatan' => $this->request->getVar('kegiatan'),
            'kategori' => $this->request->getVar('kategori'),
            'qty' => $this->request->getVar('jumlah'),
            'tag' => $this->request->getVar('tag'),
            'tanggal' => $this->request->getVar('tgl'),
            'jam_mulai' => $this->request->getVar('mulai'),
            'jam_selesai' => $this->request->getVar('selesai'),
            'interval' => $interval,
            'status' => $this->request->getVar('status'),
            'status_buku' => 'draft'
        ]);

        session()->setFlashdata('pesan', 'Data Kegiatan kamu telah berhasil ditambahkan!');
        return redirect()->to('/bukuharian');
    }
}
