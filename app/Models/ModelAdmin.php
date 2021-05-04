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

    public function totalKaryawan()
    {
        return $this->db->table('tb_calkar')
            ->where('stat_calkar', '1')
            ->countAllResults();
    }

    public function totalCalkarMasuk()
    {
        return $this->db->table('tb_calkar')
            ->where('stat_calkar', '0')
            ->where('stat_pendaftaran', '1')
            ->countAllResults();
    }

    public function totalCalkarTerima()
    {
        return $this->db->table('tb_calkar')
            ->where('stat_calkar', '1')
            ->countAllResults();
    }

    public function totalCalkarTolak()
    {
        return $this->db->table('tb_calkar')
            ->where('stat_calkar', '2')
            ->countAllResults();
    }
}
