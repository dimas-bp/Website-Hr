<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelCalkar;

class Calkar extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function pendaftaran()
    {
        $data = [
            'title' => 'HR GiNK',
            'subtitle' => 'Home',
        ];
        return view('v_pendaftaran', $data);
    }
}
