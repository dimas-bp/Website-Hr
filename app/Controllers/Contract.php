<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelContract;

class Contract extends BaseController
{
    public function __construct()
    {
        $this->ModelContract = new ModelContract();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'HR GiNK',
            'contract' => $this->ModelContract->getAllData(),
            'subtitle' => 'Daftar Kontrak',
        ];
        return view('admin/v_kontrak', $data);
    }

    public function add()
    {
        $surat = $this->request->getFile('surat');
        $newName = $surat->getRandomName();
        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'status' => $this->request->getPost('status'),
            'tgl_mulai' => date('Y-m-d'),
            'tgl_berakhir' => date('Y-m-d'),
            'nama_project' => $this->request->getPost('nama_project'),
            'bidang' => $this->request->getPost('bidang'),
            'surat' => $newName
        );

        //Upload File Foto
        $surat->move('foto/', $newName);

        $this->ModelContract->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('contract'));
    }

    public function edit($id_kontrak)
    {
        $surat = $this->request->getFile('foto');
        if ($surat->getError() == 4) {
            $data = array(
                'id_kontrak' => $id_kontrak,
                'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                'status' => $this->request->getPost('status'),
                'tgl_mulai' => date('Y-m-d'),
                'tgl_berakhir' => date('Y-m-d'),
                'nama_project' => $this->request->getPost('nama_project'),
                'bidang' => $this->request->getPost('bidang')
            );
            $this->ModelContract->edit($data);
        } else {
            $contract = $this->ModelContract->detailData($id_kontrak);
            if ($contract['surat'] != "") {
                unlink('./surat/' . $contract['surat']);
            }

            $newName = $surat->getRandomName();
            $data = array(
                'id_kontrak' => $id_kontrak,
                'nama_karyawan' => $this->request->getPost('nama_karyawan'),
                'status' => $this->request->getPost('status'),
                'tgl_mulai' => date('Y-m-d'),
                'tgl_berakhir' => date('Y-m-d'),
                'nama_project' => $this->request->getPost('nama_project'),
                'bidang' => $this->request->getPost('bidang'),
                'surat_kontrak' => $newName
            );

            //Upload File Foto
            $surat->move('foto/', $newName);
            $this->ModelContract->edit($data);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('contract'));
    }

    public function delete_kontrak($id_contract)
    {
        $contract = $this->ModelContract->detailData($id_contract);
        if ($contract['surat'] != "") {
            unlink('./surat/' . $contract['surat']);
        }
        $data = array(
            'id_contract' => $id_contract,
        );
        $this->ModelContract->delete_kontrak($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('contract'));
    }
}
