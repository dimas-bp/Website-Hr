<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanner extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_banner')
			->orderBy('id_banner', 'ASC')
			->get()
			->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_banner')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_banner')
			->where('id_banner', $data['id_banner'])
			->update($data);
	}

	public function delete_banner($data)
	{
		$this->db->table('tb_banner')
			->where('id_banner', $data['id_banner'])
			->delete($data);
	}
}
