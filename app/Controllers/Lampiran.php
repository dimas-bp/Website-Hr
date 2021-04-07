<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLampiran;

class Lampiran extends BaseController
{
	public function __construct()
	{
		$this->ModelLampiran = new ModelLampiran();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'lampiran' => $this->ModelLampiran->getAllData(),
			'subtitle' => 'Daftar Lampiran',
		];
		return view('admin/v_lampiran', $data);
	}

	public function add()
	{
		$data = array(
			'lampiran' => $this->request->getPost('lampiran')
		);
		$this->ModelLampiran->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('lampiran'));
	}

	public function edit($id_lampiran)
	{
		$data = array(
			'id_lampiran' => $id_lampiran,
			'lampiran' => $this->request->getPost('lampiran'),
		);
		$this->ModelLampiran->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to(base_url('lampiran'));
	}

	public function delete_lampiran($id_lampiran)
	{
		$data = array(
			'id_lampiran' => $id_lampiran,
		);
		$this->ModelLampiran->delete_Lampiran($data);
		session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('lampiran'));
	}
}
