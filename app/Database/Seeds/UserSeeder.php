<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$user = [
			[
				'nama' 		=> 'Paris Hartati',
				'no_hp'		=> '(+62) 522 5476 7487',
				'alamat'	=> 'Ds. Siliwangi No. 571, Tebing Tinggi 11652, JaTim',
				'email'		=> 'pariati@gmail.com',
				'password'	=> password_hash('123456789', PASSWORD_BCRYPT),
				'foto'		=> 'default.jpg',
				'status'	=> 'tidak aktif',
				'level'		=> 'admin'
			],
			[
				'nama' 		=> 'Cemeti Putra',
				'no_hp'		=> '(+62) 522 5476 7487',
				'alamat'	=> 'Jln. W.R. Supratman No. 780, Bekasi 99364, JaTeng',
				'email'		=> 'cemetra@gmail.com',
				'password'	=> password_hash('123456789', PASSWORD_BCRYPT),
				'foto'		=> 'default.jpg',
				'status'	=> 'tidak aktif',
				'level'		=> 'member'
			],
			[
				'nama' 		=> 'Baktiadi Saputra',
				'no_hp'		=> '(+62) 522 5476 7487',
				'alamat'	=> 'Psr. Baladewa No. 145, Sabang 93316, JaTeng',
				'email'		=> 'baktiatra@gmail.com',
				'password'	=> password_hash('123456789', PASSWORD_BCRYPT),
				'foto'		=> 'default.jpg',
				'status'	=> 'tidak aktif',
				'level'		=> 'member'
			],
		];

		$this->db->table('tbl_user')->insertBatch($user);
	}
}
