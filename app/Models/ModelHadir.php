<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHadir extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_kehadiran')
			->orderBy('id_kehadiran', 'ASC')
			->get()
			->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_kehadiran')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_kehadiran')
			->where('id_kehadiran', $data['id_kehadiran'])
			->update($data);
	}

	public function delete_hadir($data)
	{
		$this->db->table('tb_kehadiran')
			->where('id_kehadiran', $data['id_kehadiran'])
			->delete($data);
	}
}
