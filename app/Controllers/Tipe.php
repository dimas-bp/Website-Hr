<?php

namespace App\Controllers;

use App\Models\Model_tipe;

class Tipe extends BaseController
{
    public function __construct()
    {
        $this->Model_tipe = new Model_tipe();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Tipe',
            'tipe' => $this->Model_tipe->all_data(),
            'isi'     => 'v_tipe'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array('tipe_kar' => $this->request->getPost());
        $this->Model_tipe->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('tipe'));
    }
}
