<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Calkar extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Calon Karyawan'
		];
		return view('calkar/v_dashboard', $data);
	}
}
