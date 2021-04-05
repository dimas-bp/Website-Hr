<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;

class Jadwal extends BaseController
{
	public function __construct()
	{
		$this->ModelJadwal = new ModelJadwal();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'jadwal' => $this->ModelJadwal->getAllData(),
			'subtitle' => 'Buka Lowongan',
		];
		return view('admin/v_jadwal', $data);
	}

	public function add()
	{
		$data = [
			'lowongan' => $this->request->getPost('lowongan'),
		];
		$this->ModelJadwal->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('jadwal'));
	}

	public function edit($id_lowongan)
	{
		$data = [
			'id_lowongan' => $id_lowongan,
			'lowongan' => $this->request->getPost('lowongan'),
		];
		$this->ModelJadwal->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to(base_url('jadwal'));
	}

	public function delete_lowongan($id_lowongan)
	{
		$data = [
			'id_lowongan' => $id_lowongan,
		];
		$this->ModelJadwal->delete_lowongan($data);
		session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('jadwal'));
	}

	public function statusAktif($id_lowongan)
	{
		$data = [
			'id_lowongan' => $id_lowongan,
			'status' => 1
		];
		$this->ModelJadwal->resetStatus();
		$this->ModelJadwal->edit($data);
		session()->setFlashdata('pesan', 'Status Lowongan Berhasil Di Ganti !!!');
		return redirect()->to('/jadwal');
	}
	public function statusNonAktif($id_lowongan)
	{
		$data = [
			'id_lowongan' => $id_lowongan,
			'status' => 0
		];
		$this->ModelJadwal->edit($data);
		session()->setFlashdata('pesan', 'Status Lowongan Berhasil Di Ganti !!!');
		return redirect()->to('/jadwal');
	}
}
