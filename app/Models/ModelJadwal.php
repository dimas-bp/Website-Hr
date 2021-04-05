<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{
	public function getAllData()
	{
		return $this->db->table('tb_lowongan')
			->orderBy('id_lowongan', 'ASC')
			->get()
			->getResultArray();
	}

	public function add($data)
	{
		$this->db->table('tb_lowongan')->insert($data);
	}

	public function edit($data)
	{
		$this->db->table('tb_lowongan')
			->where('id_lowongan', $data['id_lowongan'])
			->update($data);
	}

	public function delete_lowongan($data)
	{
		$this->db->table('tb_lowongan')
			->where('id_lowongan', $data['id_lowongan'])
			->delete($data);
	}

	public function resetStatus()
	{
		$this->db->table('tb_lowongan')
			->update(['status' => 0]);
	}

	public function statusLowongan()
	{
		return $this->db->table('tb_lowongan')
			->where('status', '1')
			->get()
			->getRowArray();
	}
}
