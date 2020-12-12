<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Laporan extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }
    public function index()
    {
        $resultUser = $this->bukuModel->getReportUser();
        $data = [
            'title' => 'Laporan | Puskesmas Mlati II',
            'report' => $resultUser
        ];

        echo view('report/index', $data);
    }

    public function laporanAll()
    {
        $bln = $this->request->getVar('bln');
        $thn = $this->request->getVar('thn');
        $resultUser = $this->bukuModel->getReportAll($thn, $bln);
        $data = [
            'title' => 'Laporan | Puskesmas Mlati II',
            'report' => $resultUser,
            'bulan' => $bln

        ];

        return view('report/pages/laporanAll', $data);
    }

    public function laporan_kategori($bln, $thn, $id)
    {
        $bln = $this->request->getVar('bulan');
        $thn = $this->request->getVar('tahun');
        $resultUser = $this->bukuModel->getReportAll($bln, $thn);
        $resultDetail = $this->bukuModel->countMonthly($bln, $thn, $id);
        $data = [
            'title' => 'Laporan | Puskesmas Mlati II',
            'report' => $resultUser,
            'detail' => $resultDetail
        ];

        return view('report/pages/laporanAll', $data);
    }
}
