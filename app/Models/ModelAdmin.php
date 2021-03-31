<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function detailSetting()
    {
        return $this->db->table('tb_setting')
            ->where('id', '1')
            ->get()->getRowArray();
    }

    public function saveSetting($data)
    {
        return $this->db->table('tb_setting')
            ->where('id', '1')
            ->update($data);
    }
}
