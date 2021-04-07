<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Daftar extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Pendaftaran Masuk'
        ];
        return view('admin/daftar/v_masuk', $data);
    }
}
