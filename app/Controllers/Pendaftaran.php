<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelCalkar;

class Pendaftaran extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelJadwal = new ModelJadwal();
		$this->ModelCalkar = new ModelCalkar();
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Pendaftaran',
			'jadwal' => $this->ModelJadwal->statusLowongan(),
			'validation' => \Config\Services::validation(),
		];
		return view('v_pendaftaran', $data);
	}

	public function simpanPendaftaran()
	{
		if ($this->validate([
			'email' => [
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[tb_calkar.email]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
					'valid_email' => 'Format Email Harus Valid',
					'is_unique' => '{field} Sudah Terdaftar !!'
				]
			],
			'nama_lengkap' => [
				'label' => 'Nama Lengkap',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
					'min_length' => '{field} harus memiliki minimal 5 karakter !!!'
				]
			],
		])) {
			//Jika tidak ada validasi maka simpan data
			$data = [
				'email' => $this->request->getPost('email'),
				'nama_lengkap' => $this->request->getPost('nama_lengkap'),
				'password' => $this->request->getPost('password'),
			];
			$this->ModelCalkar->add($data);
			session()->setFlashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login Untuk Melengkapi Data !!!');
			return redirect()->to('/pendaftaran');
		} else {
			//jika ada validasi
			$validation = \Config\Services::validation();
			return redirect()->to('/pendaftaran')->withInput()->with('validation', $validation);
		}
	}
}
