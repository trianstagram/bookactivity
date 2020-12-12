<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'bukuharian';
    protected $primaryKey = 'id_bh';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_users', 'kegiatan', 'kategori', 'qty', 'tag', 'tanggal', 'jam_mulai', 'jam_selesai', 'interval', 'status', 'status_buku'];

    public function showDaily($id)
    {
        return $this->db->table('bukuharian')
            ->where(array('id_users' => $id))
            ->get()->getResultArray();
    }
    public function showRowDaily($id)
    {
        return $this->db->table('bukuharian')
            ->where(array('id_bh' => $id))
            ->get()->getRowArray();
    }
    public function showDetail($id_bh)
    {
        return $this->db->table('bukuharian')
            ->where(array('id_bh' => $id_bh))
            ->get()->getResultArray();
    }
    public function countMonthly($bulan, $tahun, $id)
    {
        $sql = "call getCountMonthly('$bulan','$tahun','$id')";
        return $this->db->query($sql)->getResultArray();
    }
    public function getReportUser()
    {
        $sql = "call getReportUser";
        return $this->db->query($sql)->getResultArray();
    }
    public function getReportAll($thn, $bln)
    {
        $sql = "call getLaporanAll('$thn','$bln')";
        return $this->db->query($sql)->getResultArray();
    }

    //menampilkan bulanan
    //SELECT SUM(`interval`)
    // FROM bukuharian
    // WHERE YEAR(tanggal) = '2020' AND MONTH(tanggal) = '10'

    //perbulan
    //select month(tanggal), sum(interval) from bukuharian group by month (tanggal)
    //perhari
    //select day(tanggal), sum(interval) from bukuharian group by day (tanggal)
}
