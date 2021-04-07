<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
	public function __construct()
	{
		$this->ModelUser = new ModelUser();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'user' => $this->ModelUser->getAllData(),
			'subtitle' => 'Daftar User',
		];
		return view('admin/v_user', $data);
	}

	public function add()
	{
		$file = $this->request->getFile('foto');
		$newName = $file->getRandomName();
		$data = array(
			'nama_user' => $this->request->getPost('nama_user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'foto' => $newName
		);

		//Upload File Foto
		$file->move('foto/', $newName);

		$this->ModelUser->add($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		return redirect()->to(base_url('user'));
	}

	public function edit($id_user)
	{
		$file = $this->request->getFile('foto');
		if ($file->getError() == 4) {
			$data = array(
				'id_user' => $id_user,
				'nama_user' => $this->request->getPost('nama_user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password')
			);
			$this->ModelUser->edit($data);
		} else {
			$user = $this->ModelUser->detailData($id_user);
			if ($user['foto'] != "") {
				unlink('./foto/' . $user['foto']);
			}

			$newName = $file->getRandomName();
			$data = array(
				'id_user' => $id_user,
				'nama_user' => $this->request->getPost('nama_user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'foto' => $newName
			);

			//Upload File Foto
			$file->move('foto/', $newName);
			$this->ModelUser->edit($data);
		}

		session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
		return redirect()->to(base_url('user'));
	}

	public function delete_user($id_user)
	{
		$user = $this->ModelUser->detailData($id_user);
		if ($user['foto'] != "") {
			unlink('./foto/' . $user['foto']);
		}
		$data = array(
			'id_user' => $id_user,
		);
		$this->ModelUser->delete_user($data);
		session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
		return redirect()->to(base_url('user'));
	}
}
