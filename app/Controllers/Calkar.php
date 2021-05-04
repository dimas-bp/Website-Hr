<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelCalkar;
use App\Models\ModelLampiran;
use App\Models\ModelWilayah;
use App\Models\ModelPekerjaan;
use App\Models\ModelAdmin;
use App\Models\ModelRating;

class Calkar extends BaseController
{
	public function __construct()
	{
		$this->ModelCalkar = new ModelCalkar();
		$this->ModelLampiran = new ModelLampiran();
		$this->ModelWilayah = new ModelWilayah();
		$this->ModelPekerjaan = new ModelPekerjaan();
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelRating = new ModelRating();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Calon Karyawan',
			'calkar' => $this->ModelCalkar->getFormulir(),
			'berkas' => $this->ModelCalkar->lampiran(),
			'lampiran' => $this->ModelLampiran->getAllData(),
			'provinsi' => $this->ModelWilayah->getProvinsi(),
			'spesialisasi' => $this->ModelPekerjaan->getSpesialisasi(),
			'validation' => \Config\Services::validation()
		];
		return view('calkar/v_formulir', $data);
	}

	public function updateIdentitas($id_calkar)
	{
		$data = [
			'id_calkar' => $id_calkar,
			'nama_lengkap' => $this->request->getPost('nama_lengkap'),
			'tempat_lahir' => $this->request->getPost('tempat_lahir'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'email' => $this->request->getPost('email'),
			'pendidikan' => $this->request->getPost('pendidikan'),
			'agama' => $this->request->getPost('agama'),
			'jk' => $this->request->getPost('jk'),
			'no_telpon' => $this->request->getPost('no_telpon'),
		];

		$this->ModelCalkar->edit($data);
		session()->setFlashdata('pesan', 'Identitas Berhasil Di Update');
		return redirect()->to('/calkar');
	}

	public function updateFoto($id_calkar)
	{

		if ($this->validate([
			'foto' => [
				'label' => 'Foto',
				'rules' => 'max_size[foto,2048]',
				'errors' => [
					'max_size' => 'Ukuran {field} Maksimal 2MB !!'
				]
			]
		])) {
			//Hapus Foto lama di direktori
			$calkar = $this->ModelCalkar->detailData($id_calkar);
			if ($calkar['foto'] != "" or $calkar['foto'] != null) {
				unlink('./foto/' . $calkar['foto']);
			}

			//Upload File Foto
			$file = $this->request->getFile('foto');
			$newName = $file->getRandomName();
			$data = [
				'id_calkar' => $id_calkar,
				'foto' => $newName
			];

			//Upload File Foto
			$file->move('foto/', $newName);

			$this->ModelCalkar->edit($data);
			session()->setFlashdata('pesan', 'Foto Berhasil Di Update');
			return redirect()->to('/calkar');
		} else {
			//jika ada validasi
			$validation = \Config\Services::validation();
			return redirect()->to('/calkar')->withInput()->with('validation', $validation);
		}
	}

	public function updateDataAlamat($id_calkar)
	{
		$data = [
			'id_calkar' => $id_calkar,
			'id_provinsi' => $this->request->getPost('id_provinsi'),
			'id_kabupaten' => $this->request->getPost('id_kabupaten'),
			'id_kecamatan' => $this->request->getPost('id_kecamatan'),
			'alamat' => $this->request->getPost('alamat')
		];
		$this->ModelCalkar->edit($data);
		session()->setFlashdata('pesan', 'Alamat Berhasil Di Update');
		return redirect()->to('/calkar');
	}

	public function updateDataPekerjaan($id_calkar)
	{
		$data = [
			'id_calkar' => $id_calkar,
			'id_spesialisasi' => $this->request->getPost('id_spesialisasi'),
			'id_bidang' => $this->request->getPost('id_bidang'),
			'id_skill' => $this->request->getPost('id_skill'),
		];
		$this->ModelCalkar->edit($data);
		session()->setFlashdata('pesan', 'Pekerjaan Berhasil Di Update');
		return redirect()->to('/calkar');
	}

	public function addBerkas($id_calkar)
	{
		if ($this->validate([
			'id_lampiran' => [
				'label' => 'Lampiran',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Belum Dipilih !!'
				]
			],
			'berkas' => [
				'label' => 'Berkas',
				'rules' => 'max_size[berkas,2048]|ext_in[berkas,pdf]',
				'errors' => [
					'max_size' => 'Ukuran {field} Maksimal 2MB !!',
					'ext_in' => '{field} Wajib Format PDF !!'
				]
			]
		])) {
			$berkas = $this->request->getFile('berkas');
			$nama_file = $berkas->getRandomName();

			$data = [
				'id_calkar' => $id_calkar,
				'id_lampiran' => $this->request->getPost('id_lampiran'),
				'ket' => $this->request->getPost('ket'),
				'berkas' => $nama_file
			];
			$berkas->move('berkas/', $nama_file);

			$this->ModelCalkar->addBerkas($data);
			session()->setFlashdata('pesan', 'Berkas Berhasil Di Upload');
			return redirect()->to('/calkar');
		} else {
			//jika ada validasi
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to('/calkar');
		}
	}

	public function deleteBerkas($id_berkas)
	{
		$berkas = $this->ModelCalkar->detailBerkas($id_berkas);
		if ($berkas['berkas'] != "") {
			unlink('./berkas/' . $berkas['berkas']);
		}
		$data = array(
			'id_berkas' => $id_berkas,
		);
		$this->ModelCalkar->deleteBerkas($data);
		session()->setFlashdata('pesan', 'Berkas Berhasil Di Hapus !!!');
		return redirect()->to(base_url('calkar'));
	}

	public function apply($id_calkar)
	{
		$data = array(
			'id_calkar' => $id_calkar,
			'stat_pendaftaran' => '1'
		);
		$this->ModelCalkar->edit($data);
		session()->setFlashdata('pesan', 'Data Berhasil Dikirim !!!');
		return redirect()->to(base_url('calkar'));
	}

	public function cetak_berkas()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Calon Karyawan',
			'calkar' => $this->ModelCalkar->getFormulir(),
			'setting' => $this->ModelAdmin->detailSetting(),
		];
		return view('calkar/v_cetakberkas', $data);
	}
}
