<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDaftar extends Model
{

	public function getDaftarMasuk()
	{
		return $this->db->table('tb_calkar')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tb_calkar.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tb_calkar.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tb_calkar.id_kecamatan', 'left')
			->join('tb_spesialisasi', 'tb_spesialisasi.id_spesialisasi = tb_calkar.id_spesialisasi', 'left')
			->join('tb_bidang', 'tb_bidang.id_bidang = tb_calkar.id_bidang', 'left')
			->join('tb_rating', 'tb_rating.id_rating = tb_calkar.id_rating', 'left')
			->where('stat_calkar', '0')
			->where('stat_pendaftaran', '1')
			->orderBy('id_calkar', 'DESC')
			->get()
			->getResultArray();
	}

	public function get_rating_data()
	{
		return $this->db->table('tb_calkar')
			->join('tb_rating', 'tb_rating.id_rating = tb_calkar.id_rating', 'left')
			->where('id_calkar', session()->get('id_calkar'))
			->get()
			->getResultArray();
	}

	public function getDiterima()
	{
		return $this->db->table('tb_calkar')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tb_calkar.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tb_calkar.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tb_calkar.id_kecamatan', 'left')
			->join('tb_spesialisasi', 'tb_spesialisasi.id_spesialisasi = tb_calkar.id_spesialisasi', 'left')
			->join('tb_bidang', 'tb_bidang.id_bidang = tb_calkar.id_bidang', 'left')
			->join('tb_rating', 'tb_rating.id_rating = tb_calkar.id_rating', 'left')
			->where('stat_calkar', '1')
			->orderBy('id_calkar', 'DESC')
			->get()
			->getResultArray();
	}

	public function detailData($id_calkar)
	{
		return $this->db->table('tb_calkar')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tb_calkar.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tb_calkar.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tb_calkar.id_kecamatan', 'left')
			->join('tb_spesialisasi', 'tb_spesialisasi.id_spesialisasi = tb_calkar.id_spesialisasi', 'left')
			->join('tb_bidang', 'tb_bidang.id_bidang = tb_calkar.id_bidang', 'left')
			->join('tb_rating', 'tb_rating.id_rating = tb_calkar.id_rating', 'left')
			->where('id_calkar', $id_calkar)
			->get()
			->getRowArray();
	}

	public function lampiran($id_calkar)
	{
		return $this->db->table('tb_berkas')
			->join('tb_lampiran', 'tb_lampiran.id_lampiran = tb_berkas.id_lampiran', 'left')
			->where('tb_berkas.id_calkar', $id_calkar)
			->get()
			->getResultArray();
	}

	public function edit($data)
	{
		$this->db->table('tb_calkar')
			->where('id_calkar', $data['id_calkar'])
			->update($data);
	}

	public function detailDataKaryawan($id_calkar)
	{
		return $this->db->table('tb_calkar')
			->where('id_calkar', $id_calkar)
			->get()
			->getRowArray();
	}

	public function getDitolak()
	{
		return $this->db->table('tb_calkar')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tb_calkar.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tb_calkar.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tb_calkar.id_kecamatan', 'left')
			->join('tb_spesialisasi', 'tb_spesialisasi.id_spesialisasi = tb_calkar.id_spesialisasi', 'left')
			->join('tb_bidang', 'tb_bidang.id_bidang = tb_calkar.id_bidang', 'left')
			->join('tb_rating', 'tb_rating.id_rating = tb_calkar.id_rating', 'left')
			->where('stat_calkar', '2')
			->orderBy('id_calkar', 'DESC')
			->get()
			->getResultArray();
	}

	public function getAllDataLaporan()
	{
		return $this->db->table('tb_calkar')
			->where('stat_calkar', '1')
			->orderBy('id_calkar', 'ASC')
			->get()
			->getResultArray();
	}

	public function getDataLaporan($id_calkar)
	{
		return $this->db->table('tb_calkar')
			->join('tb_spesialisasi', 'tb_spesialisasi.id_spesialisasi = tb_calkar.id_spesialisasi', 'left')
			->join('tb_bidang', 'tb_bidang.id_bidang = tb_calkar.id_bidang', 'left')
			->where('tb_calkar.stat_calkar', '1')
			->where('tb_calkar.id_calkar', $id_calkar)
			->orderBy('id_calkar', 'DESC')
			->get()
			->getResultArray();
	}
}
