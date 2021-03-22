<?php

namespace App\Controllers;

use App\Models\Model_calkar;

class Calkar extends BaseController
{
    public function __construct()
    {
        $this->Model_calkar = new Model_calkar();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Calon Karyawan',
            'tipe' => $this->Model_calkar->all_data(),
            'isi'     => 'v_calkar'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array('tipe_kar' => $this->request->getPost());
        $this->Model_calkar->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('tipe'));
    }
}
