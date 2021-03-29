<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HR GiNK',
			'subtitle' => 'Dashboard',
		];
		return view('admin/v_dashboard', $data);
	}
}
