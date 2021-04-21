<?php

namespace App\Controllers;

use App\Models\ModelBaner;
use App\Models\ModelAdmin;

class Home extends BaseController
{
	public function __construct()
	{
		$this->ModelBaner = new ModelBaner();
		$this->ModelAdmin = new ModelAdmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'baner' => $this->ModelBaner->getAllData(),
			'beranda' => $this->ModelAdmin->detailSetting(),
			'subtitle' => 'Home',
		];
		return view('v_home', $data);
	}
}
