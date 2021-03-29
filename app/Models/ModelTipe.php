<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTipe extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_tipe')
			->orderBy('id_tipe', 'ASC')
			->get()
			->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_tipe')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_tipe')
			->where('id_tipe', $data['id_tipe'])
			->update($data);
	}

	public function delete_tipe($data)
	{
		$this->db->table('tb_tipe')
			->where('id_tipe', $data['id_tipe'])
			->delete($data);
	}
}
