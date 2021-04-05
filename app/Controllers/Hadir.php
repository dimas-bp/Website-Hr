<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelHadir;

class Hadir extends BaseController
{
	public function __construct()
	{
		$this->ModelHadir = new ModelHadir();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'hadir' => $this->ModelHadir->getAllData(),
			'subtitle' => 'Daftar Kehadiran',
		];
		return view('admin/v_hadir', $data);
	}

	public function add()
	{
		$data = array(
			'nm_kehadiran' => $this->request->getPost('nm_kehadiran'),
			'tipe_kar' => $this->request->getPost('tipe_kar'),
			'izin' => $this->request->getPost('izin'),
			'cuti' => $this->request->getPost('cuti'),
			'alfa' => $this->request->getPost('alfa')
		);
		$this->ModelHadir->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('hadir'));
	}

	public function edit($id_kehadiran)
	{
		$data = array(
			'id_kehadiran' => $id_kehadiran,
			'nm_kehadiran' => $this->request->getPost('nm_kehadiran'),
			'tipe_kar' => $this->request->getPost('tipe_kar'),
			'izin' => $this->request->getPost('izin'),
			'cuti' => $this->request->getPost('cuti'),
			'alfa' => $this->request->getPost('alfa')
		);
		$this->ModelHadir->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to(base_url('hadir'));
	}

	public function delete_hadir($id_kehadiran)
	{
		$data = array(
			'id_kehadiran' => $id_kehadiran,
		);
		$this->ModelHadir->delete_hadir($data);
		session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('hadir'));
	}
}
