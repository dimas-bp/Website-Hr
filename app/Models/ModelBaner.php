<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBaner extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_baner')
			->orderBy('id_baner', 'ASC')
			->get()
			->getResultArray();
	}

	public function detailBaner($id_baner)
	{
		return $this->db->table('tb_baner')
			->where('id_baner', $id_baner)
			->get()
			->getRowArray();
	}

	public function add($data)
	{
		$this->db->table('tb_baner')->insert($data);
	}

	public function delete_baner($data)
	{
		$this->db->table('tb_baner')
			->where('id_baner', $data['id_baner'])
			->delete($data);
	}
}
