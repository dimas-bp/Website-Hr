<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->ModelAdmin = new ModelAdmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Dashboard'
		];
		return view('admin/v_dashboard', $data);
	}

	public function setting()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Setting',
			'setting' => $this->ModelAdmin->detailSetting()
		];
		return view('admin/v_setting', $data);
	}

	public function saveSetting()
	{
		$file = $this->request->getFile('logo');
		//Jika Gambar/Logo tidak diganti
		if ($file->getError() == 4) {
			$data = [
				'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
				'alamat' => $this->request->getPost('alamat'),
				'no_telpon' => $this->request->getPost('no_telpon'),
				'email' => $this->request->getPost('email'),
				'web' => $this->request->getPost('web'),
				'sosial_media' => $this->request->getPost('sosial_media'),
				'deskripsi' => $this->request->getPost('deskripsi')
			];
			$this->ModelAdmin->saveSetting($data);
		} else {
			//Jika Gambar/Logo diganti
			$setting = $this->ModelAdmin->detailSetting();
			if ($setting['logo'] != "") {
				unlink('./logo/' . $setting['logo']);
			}
			$newName = $file->getRandomName();
			$data = [
				'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
				'alamat' => $this->request->getPost('alamat'),
				'no_telpon' => $this->request->getPost('no_telpon'),
				'email' => $this->request->getPost('email'),
				'web' => $this->request->getPost('web'),
				'sosial_media' => $this->request->getPost('sosial_media'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'logo' => $newName
			];
			$file->move('logo/', $newName);
			$this->ModelAdmin->saveSetting($data);
		}

		session()->setFlashdata('pesan', 'Settingan Berhasil di Perbarui !!!');
		return redirect()->to('/admin/setting');
	}
}
