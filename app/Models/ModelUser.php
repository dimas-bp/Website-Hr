<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_user')
			->orderBy('id_user', 'ASC')
			->get()
			->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_user')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_user')
			->where('id_user', $data['id_user'])
			->update($data);
	}

	public function delete_user($data)
	{
		$this->db->table('tb_user')
			->where('id_user', $data['id_user'])
			->delete($data);
	}

	public function detailData($id_user)
	{
		return $this->db->table('tb_user')
			->where('id_user', $id_user)
			->get()
			->getRowArray();
	}
}
