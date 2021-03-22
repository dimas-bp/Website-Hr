<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_calkar extends Model
{
    public function all_data()
    {
        return $this->db->table('tb_calkar')->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tb_calkar')->insert($data);
    }
}
