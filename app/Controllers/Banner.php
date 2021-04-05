<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBanner;

class Banner extends BaseController
{
	public function __construct()
	{
		$this->ModelBanner = new ModelBanner();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'hadir' => $this->ModelBanner->getAllData(),
			'subtitle' => 'Banner',
		];
		return view('admin/v_banner', $data);
	}

	public function add()
	{
		$data = array(
			'nm_kehadiran' => $this->request->getPost('nm_kehadiran'),
			'tipe_kar' => $this->request->getPost('tipe_kar'),
			'izin' => $this->request->getPost('izin'),
			'cuti' => $this->request->getPost('cuti'),
			'alfa' => $this->request->getPost('alfa'),
			'bulan' => $this->request->getPost('bulan')
		);
		$this->ModelBanner->add($data);
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
			'alfa' => $this->request->getPost('alfa'),
			'bulan' => $this->request->getPost('bulan'),
		);
		$this->ModelBanner->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to(base_url('hadir'));
	}

	public function delete_hadir($id_kehadiran)
	{
		$data = array(
			'id_kehadiran' => $id_kehadiran,
		);
		$this->ModelBanner->delete_hadir($data);
		session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('hadir'));
	}
}
