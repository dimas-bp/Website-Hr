<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBaner;

class Baner extends BaseController
{
	public function __construct()
	{
		$this->ModelBaner = new ModelBaner();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Baner',
			'baner' => $this->ModelBaner->getAllData()
		];
		return view('admin/v_baner', $data);
	}

	public function add()
	{
		$file = $this->request->getFile('baner');

		$newName = $file->getRandomName();
		$data = [
			'ket' => $this->request->getPost('ket'),
			'baner' => $newName
		];
		$file->move('assets/', $newName);
		$this->ModelBaner->add($data);

		session()->setFlashdata('tambah', 'Data Berhasil Ditambahkan !!!');
		return redirect()->to('/baner');
	}

	public function delete_baner($id_baner)
	{
		$baner = $this->ModelBaner->detailBaner($id_baner);
		if ($baner['baner'] != "") {
			unlink('./assets/' . $baner['baner']);
		}

		$data = array(
			'id_baner' => $id_baner,
		);
		$this->ModelBaner->delete_baner($data);
		session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('baner'));
	}
}
