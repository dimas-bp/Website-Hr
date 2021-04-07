<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDaftar extends Model
{

	public function getDaftarMasuk()
	{
		return $this->db->table('tb_calkar')
			->where('stat_pendaftaran', 1)
			->get()
			->getResultArray();
	}
}
