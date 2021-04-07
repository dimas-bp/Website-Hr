<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLampiran extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_lampiran')
			->orderBy('id_lampiran', 'ASC')
			->get()
			->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_lampiran')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_lampiran')
			->where('id_lampiran', $data['id_lampiran'])
			->update($data);
	}

	public function delete_lampiran($data)
	{
		$this->db->table('tb_lampiran')
			->where('id_lampiran', $data['id_lampiran'])
			->delete($data);
	}
}
