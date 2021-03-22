<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_tipe extends Model
{
    public function all_data()
    {
        return $this->db->table('tb_tipe')->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_tipe')->insert($data);
    }
}
