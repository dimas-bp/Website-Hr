<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDaftar;
use App\Models\ModelAdmin;
use App\Models\ModelRating;

class Daftar extends BaseController
{
    public function __construct()
    {
        $this->ModelDaftar = new ModelDaftar();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelRating = new ModelRating();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Pendaftaran Masuk',
            'daftar' => $this->ModelDaftar->getDaftarMasuk(),
        ];
        return view('admin/daftar/v_masuk', $data);
    }

    public function edit($id_calkar)
    {
        $file = $this->request->getFile('foto');
        if ($file->getError() == 4) {
            $data = array(
                'id_calkar' => $id_calkar,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'tipe_kar' => $this->request->getPost('tipe_kar'),
                'bidang' => $this->request->getPost('bidang'),
                'masa_kontrak' => $this->request->getPost('masa_kontrak'),
                'jk' => $this->request->getPost('jk'),
            );
            $this->ModelDaftar->edit($data);
        } else {
            $calkar = $this->ModelDaftar->detailData($id_calkar);
            if ($calkar['foto'] != "") {
                unlink('./foto/' . $karyawan['foto']);
            }

            $newName = $file->getRandomName();
            $data = array(
                'id_calkar' => $id_calkar,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'tipe_kar' => $this->request->getPost('tipe_kar'),
                'bidang' => $this->request->getPost('bidang'),
                'masa_kontrak' => $this->request->getPost('masa_kontrak'),
                'jk' => $this->request->getPost('jk'),
                'foto' => $newName
            );

            //Upload File Foto
            $file->move('foto/', $newName);
            $this->ModelDaftar->edit($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('daftar/listDiterimaKaryawan'));
    }

    public function rate()
    {

        if ($this->request->getPost()) {
            $modelRating = new ModelRating();
            $data = $this->request->getPost();
            $rating = new \App\Entities\Rating();

            $rating->fill($data);
            $modelRating->save($rating);

            session()->setFlashdata('terima', 'Rating Berhasil di tambahkan');
            return redirect()->to(base_url('daftar'));
        }
    }

    public function listDiterima()
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Pendaftaran Diterima',
            'daftar' => $this->ModelDaftar->getDiterima()
        ];
        return view('admin/daftar/v_diterima', $data);
    }

    public function listDiterimaKaryawan()
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Karyawan',
            'daftar' => $this->ModelDaftar->getDiterima()
        ];
        return view('admin/daftar/v_karyawan', $data);
    }

    public function listDitolak()
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Pendaftaran Ditolak',
            'daftar' => $this->ModelDaftar->getDitolak()
        ];
        return view('admin/daftar/v_ditolak', $data);
    }

    public function detailData($id_calkar)
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Detail Calon Karyawan',
            'calkar' => $this->ModelDaftar->detailData($id_calkar),
            'berkas' => $this->ModelDaftar->lampiran($id_calkar)
        ];
        return view('admin/daftar/v_detail', $data);
    }

    public function diterima($id_calkar)
    {
        $data = [
            'id_calkar' => $id_calkar,
            'stat_calkar' => '1'
        ];
        $this->ModelDaftar->edit($data);
        session()->setFlashdata('terima', 'Calon Karyawan Telah Diterima');
        return redirect()->to(base_url('daftar'));
    }

    public function ditolak($id_calkar)
    {
        $data = [
            'id_calkar' => $id_calkar,
            'stat_calkar' => '2'
        ];
        $this->ModelDaftar->edit($data);
        session()->setFlashdata('tolak', 'Calon Karyawan Telah Ditolak');
        return redirect()->to(base_url('daftar'));
    }

    public function laporan()
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Pendaftaran Diterima',
            'daftar' => $this->ModelDaftar->getAllDataLaporan()
        ];
        return view('admin/daftar/v_laporan', $data);
    }

    public function cetakLaporan($id_calkar)
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Cetak Laporan',
            'setting' => $this->ModelAdmin->detailSetting(),
            'calkar' => $this->ModelDaftar->getDataLaporan($id_calkar)
        ];
        return view('admin/daftar/v_cetaklaporan', $data);
    }
}
