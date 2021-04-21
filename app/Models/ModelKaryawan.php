<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKaryawan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tb_karyawan')
            ->orderBy('id_karyawan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_karyawan')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tb_karyawan')
            ->where('id_karyawan', $data['id_karyawan'])
            ->update($data);
    }

    public function delete_karyawan($data)
    {
        $this->db->table('tb_karyawan')
            ->where('id_karyawan', $data['id_karyawan'])
            ->delete($data);
    }

    public function detailData($id_karyawan)
    {
        return $this->db->table('tb_karyawan')
            ->where('id_karyawan', $id_karyawan)
            ->get()
            ->getRowArray();
    }
}
