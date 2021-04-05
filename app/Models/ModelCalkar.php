<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCalkar extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_calkar')
			->orderBy('id_calkar', 'ASC')
			->get()
			->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_calkar')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_calkar')
			->where('id_calkar', $data['id_calkar'])
			->update($data);
	}

	public function delete_hadir($data)
	{
		$this->db->table('tb_calkar')
			->where('id_calkar', $data['id_calkar'])
			->delete($data);
	}
}
