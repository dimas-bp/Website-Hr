<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTipe;

class Tipe extends BaseController
{
	public function __construct()
	{
		$this->ModelTipe = new ModelTipe();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'tipe' => $this->ModelTipe->getAllData(),
			'subtitle' => 'Tipe',
		];
		return view('admin/v_tipe', $data);
	}

	public function add()
	{
		$data = array(
			'tipe_kar' => $this->request->getPost('tipe_kar')
		);
		$this->ModelTipe->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('tipe'));
	}

	public function edit($id_tipe)
	{
		$data = array(
			'id_tipe' => $id_tipe,
			'tipe_kar' => $this->request->getPost('tipe_kar'),
		);
		$this->ModelTipe->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to(base_url('tipe'));
	}

	public function delete_tipe($id_tipe)
	{
		$data = array(
			'id_tipe' => $id_tipe,
		);
		$this->ModelTipe->delete_tipe($data);
		session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('tipe'));
	}
}
