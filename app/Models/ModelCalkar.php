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

	public function detailData($id_calkar)
	{
		return $this->db->table('tb_calkar')
			->where('id_calkar', $id_calkar)
			->get()
			->getRowArray();
	}

	public function get_rating_data()
	{
		return $this->db->table('tb_calkar')
			->where('id_calkar', session()->get('id_calkar'))
			->get()
			->getRowArray();
	}

	public function getFormulir()
	{
		return $this->db->table('tb_calkar')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tb_calkar.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tb_calkar.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tb_calkar.id_kecamatan', 'left')
			->join('tb_spesialisasi', 'tb_spesialisasi.id_spesialisasi = tb_calkar.id_spesialisasi', 'left')
			->join('tb_bidang', 'tb_bidang.id_bidang = tb_calkar.id_bidang', 'left')
			->where('id_calkar', session()->get('id_calkar'))
			->get()
			->getRowArray();
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

	public function lampiran()
	{
		return $this->db->table('tb_berkas')
			->join('tb_lampiran', 'tb_lampiran.id_lampiran = tb_berkas.id_lampiran', 'left')
			->where('tb_berkas.id_calkar', session()->get('id_calkar'))
			->get()
			->getResultArray();
	}

	public function addBerkas($data)
	{
		$this->db->table('tb_berkas')
			->insert($data);
	}

	public function deleteBerkas($data)
	{
		$this->db->table('tb_berkas')
			->where('id_berkas', $data['id_berkas'])
			->delete($data);
	}

	public function detailBerkas($id_berkas)
	{
		return $this->db->table('tb_berkas')
			->where('id_berkas', $id_berkas)
			->get()
			->getRowArray();
	}
}
