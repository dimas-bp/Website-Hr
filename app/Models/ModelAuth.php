<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;

class ModelAuth extends Model
{
	public function login_user($email, $password)
	{
		return $this->db->table('tb_user')->where(
			[
				'email' => $email,
				'password' => $password
			]
		)->get()->getRowArray();
	}

	public function login_calkar($email, $password)
	{
		return $this->db->table('tb_calkar')->where(
			[
				'email' => $email,
				'password' => $password
			]
		)->get()->getRowArray();
	}
}
