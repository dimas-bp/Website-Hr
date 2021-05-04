<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPekerjaan;

class Pekerjaan extends BaseController
{
    public function __construct()
    {
        $this->ModelPekerjaan = new ModelPekerjaan();
    }

    public function dataBidang($id_spesialisasi)
    {
        $data = $this->ModelPekerjaan->getBidang($id_spesialisasi);
        echo '<option value="">--Pilih Peran--</option>';
        foreach ($data as $key => $value) {
            echo '<option value="' . $value['id_bidang'] . '">' . $value['nama_bidang'] . '</option>';
        }
    }

    public function dataSkill($id_bidang)
    {
        $data = $this->ModelPekerjaan->getSkill($id_bidang);
        echo '<option value="">--Pilih Spesialisasi--</option>';
        foreach ($data as $key => $value) {
            echo '<option value="' . $value['id_skill'] . '">' . $value['nama_skill'] . '</option>';
        }
    }
}
