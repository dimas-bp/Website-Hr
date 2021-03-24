<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->ModelAuth = new ModelAuth();
		helper('form');
	}

	public function index()
	{
	}

	public function login()
	{
		return view('v_login-user');
	}

	public function cek_login_user()
	{
		if ($this->validate([
			'email' => [
				'label' => 'Email',
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
					'valid_email' => 'Harus Format Email !!!'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
				],
			]
		])) {
			//Jika Valid
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$cek_login = $this->ModelAuth->login_user($email, $password);
			if ($cek_login) {
				session()->set('nama_user', $cek_login['nama_user']);
				session()->set('email', $cek_login['email']);
				session()->set('foto', $cek_login['foto']);
				session()->set('level', 'admin');
				return redirect()->to(base_url('admin'));
			} else {
				session()->setFlashdata('pesan', 'Email Atau Password Salah !!!');
				return redirect()->to(base_url('auth/login'));
			}
		} else {
			//Tidak Valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('auth/login'));
		}
	}

	public function logout()
	{
		session()->remove('nama_user');
		session()->remove('email');
		session()->remove('foto');
		session()->remove('level');
		session()->setFlashdata('pesan', 'Anda Telah Keluar');
		return redirect()->to(base_url('auth/login'));
	}
}
