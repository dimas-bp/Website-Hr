<?php

namespace App\Controllers;

use App\Models\ModelBaner;

class Home extends BaseController
{
	public function __construct()
	{
		$this->ModelBaner = new ModelBaner();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'baner' => $this->ModelBaner->getAllData(),
			'subtitle' => 'Home',
		];
		return view('v_home', $data);
	}
}
