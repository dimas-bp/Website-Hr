<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKontrak;

class Kontrak extends BaseController
{
    public function __construct()
    {
        $this->ModelKontrak = new ModelKontrak();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'HR GiNK',
            'kontrak' => $this->ModelKontrak->getAllData(),
            'subtitle' => 'Daftar Kontrak',
        ];
        return view('admin/v_kontrak', $data);
    }

    public function add()
    {
        $file = $this->request->getFile('surat');
        $newName = $file->getRandomName();

        //Mengambil Ukuran File
        $ukuran_file = $file->getSize('kb');

        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'status' => $this->request->getPost('status'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_berakhir' => $this->request->getPost('tgl_berakhir'),
            'nama_project' => $this->request->getPost('nama_project'),
            'bidang' => $this->request->getPost('bidang'),
            'surat' => $newName,
            'ukuran_file' => $ukuran_file,
        );

        //Upload File Foto
        $file->move('surat/', $newName);

        $this->ModelKontrak->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('kontrak'));
    }

    public function notif()
    {
        $data = [
            'title' => 'HR GiNK',
            'kontrak' => $this->ModelKontrak->getAllData(),
            'subtitle' => 'Masa Kontrak',
        ];
        return view('admin/v_notif', $data);
    }

    public function edit($id_kontrak)
    {
        $file = $this->request->getFile('surat');
        if ($file->getError() == 4) {
            $data = array(
                'id_kontrak' => $id_kontrak,
                'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                'status' => $this->request->getPost('status'),
                'tgl_mulai' => $this->request->getPost('tgl_mulai'),
                'tgl_berakhir' => $this->request->getPost('tgl_berakhir'),
                'nama_project' => $this->request->getPost('nama_project'),
                'bidang' => $this->request->getPost('bidang')
            );
            $this->ModelKontrak->edit($data);
        } else {
            $kontrak = $this->ModelKontrak->detailData($id_kontrak);
            if ($kontrak['surat'] != "") {
                unlink('./surat/' . $kontrak['surat']);
            }

            $newName = $file->getRandomName();

            $ukuran_file = $file->getSize('kb');
            $data = array(
                'id_kontrak' => $id_kontrak,
                'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                'status' => $this->request->getPost('status'),
                'tgl_mulai' => date('Y-m-d'),
                'tgl_berakhir' => date('Y-m-d'),
                'nama_project' => $this->request->getPost('nama_project'),
                'bidang' => $this->request->getPost('bidang'),
                'surat' => $newName,
                'ukuran_file' => $ukuran_file
            );

            //Upload File Foto
            $file->move('surat/', $newName);
            $this->ModelKontrak->edit($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('kontrak'));
    }

    public function delete_kontrak($id_kontrak)
    {
        $kontrak = $this->ModelKontrak->detailData($id_kontrak);
        if ($kontrak['surat'] != "") {
            unlink('./surat/' . $kontrak['surat']);
        }
        $data = array(
            'id_kontrak' => $id_kontrak,
        );
        $this->ModelKontrak->delete_kontrak($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('kontrak'));
    }

    public function viewpdf($id_kontrak)
    {
        $data = [
            'title' => 'View',
            'kontrak' => $this->ModelKontrak->detailData($id_kontrak),
            'subtitle' => 'View Surat',
        ];
        return view('admin/v_viewpdf', $data);
    }
}
