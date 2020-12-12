<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $useTimestamps = true;
    protected $allowedFields = ['profesi', 'id_profesi'];

    public function kategori_profesi($id_u)
    {
        return $this->db->table('kategori')
            ->where(array('id_profesi' => $id_u))
            ->get()->getResultArray();
    }
}
