<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenispenelitianSeeder extends Seeder
{
	public function run()
	{
		$jenis = ['Kuantitatif', 'Kualitatif', 'RnD', 'PTK', 'Mixed Method'];
		foreach ($jenis as $key => $value) {
			$data = [
				'jenis_penelitian' => $value
			];
			$this->db->table('tbl_jenis_penelitian')->insert($data);
		}
	}
}
