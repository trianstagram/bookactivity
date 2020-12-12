<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_profesi', 'nama', 'foto', 'username', 'password', 'email', 'telfon', 'level'];

    public function cek_login($username, $password)
    {

        if ($this->db->table('users')
            ->where(array('username' => $username, 'password' => $password))->get()->getRowArray() == ''
        ) {
            return $this->db->table('users')
                ->where(array('username' => 'def', 'password' => 'def'))->get()->getRowArray();
        } else {
            return $this->db->table('users')
                ->where(array('username' => $username, 'password' => $password))->get()->getRowArray();
        }
    }
    public function getTargetProfesi($id)
    {
        $sql = "call getTargetProfesi($id)";
        return $this->db->query($sql)->getResultArray();
    }
}
