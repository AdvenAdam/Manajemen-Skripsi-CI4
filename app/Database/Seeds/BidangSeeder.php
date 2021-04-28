<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BidangSeeder extends Seeder
{
	public function run()
	{
		$bidang = ['RPL', 'TKJ', 'MULTIMEDIA'];
		foreach ($bidang as $val) {
			$data = [
				'bidang'    => $val
			];
			$this->db->table('tbl_bidang')->insert($data);
		}
	}
}
