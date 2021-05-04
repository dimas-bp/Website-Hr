<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class ModelPekerjaan extends Model
{
    public function getSpesialisasi()
    {
        return $this->db->table('tb_spesialisasi')
            ->get()
            ->getResultArray();
    }

    public function getBidang($id_spesialisasi)
    {
        return $this->db->table('tb_bidang')
            ->where('id_spesialisasi', $id_spesialisasi)
            ->get()
            ->getResultArray();
    }

    public function getSkill($id_bidang)
    {
        return $this->db->table('tb_skill')
            ->where('id_bidang', $id_bidang)
            ->get()
            ->getResultArray();
    }
}
