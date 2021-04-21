<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKaryawan;

class Karyawan extends BaseController
{
    public function __construct()
    {
        $this->ModelKaryawan = new ModelKaryawan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'HR GiNK',
            'karyawan' => $this->ModelKaryawan->getAllData(),
            'subtitle' => 'Daftar Karyawan',
        ];
        return view('karyawan/v_karyawan', $data);
    }

    public function add()
    {
        $file = $this->request->getFile('foto');
        $newName = $file->getRandomName();
        $data = array(
            'nm_karyawan' => $this->request->getPost('nm_karyawan'),
            'tipe_kar' => $this->request->getPost('tipe_kar'),
            'keahlian' => $this->request->getPost('keahlian'),
            'masa_kontrak' => $this->request->getPost('masa_kontrak'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'foto' => $newName
        );

        //Upload File Foto
        $file->move('foto/', $newName);

        $this->ModelKaryawan->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('karyawan'));
    }

    public function edit($id_karyawan)
    {
        $file = $this->request->getFile('foto');
        if ($file->getError() == 4) {
            $data = array(
                'id_karyawan' => $id_karyawan,
                'nm_karyawan' => $this->request->getPost('nm_karyawan'),
                'tipe_kar' => $this->request->getPost('tipe_kar'),
                'keahlian' => $this->request->getPost('keahlian'),
                'masa_kontrak' => $this->request->getPost('masa_kontrak'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            );
            $this->ModelKaryawan->edit($data);
        } else {
            $karyawan = $this->ModelKaryawan->detailData($id_karyawan);
            if ($karyawan['foto'] != "") {
                unlink('./foto/' . $karyawan['foto']);
            }

            $newName = $file->getRandomName();
            $data = array(
                'id_karyawan' => $id_karyawan,
                'nm_karyawan' => $this->request->getPost('nm_karyawan'),
                'tipe_kar' => $this->request->getPost('tipe_kar'),
                'keahlian' => $this->request->getPost('keahlian'),
                'masa_kontrak' => $this->request->getPost('masa_kontrak'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'foto' => $newName
            );

            //Upload File Foto
            $file->move('foto/', $newName);
            $this->ModelKaryawan->edit($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('karyawan'));
    }

    public function delete_karyawan($id_karyawan)
    {
        $karyawan = $this->ModelKaryawan->detailData($id_karyawan);
        if ($karyawan['foto'] != "") {
            unlink('./foto/' . $karyawan['foto']);
        }
        $data = array(
            'id_karyawan' => $id_karyawan,
        );
        $this->ModelKaryawan->delete_karyawan($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('karyawan'));
    }
}
