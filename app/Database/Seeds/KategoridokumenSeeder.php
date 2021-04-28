<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoridokumenSeeder extends Seeder
{
	public function run()
	{
		$kategori = ['Skripsi', 'Praktik Industri', 'PPL'];
		foreach ($kategori as $key => $value) {
			$data = [
				'kategori_dokumen'	=> $value
			];
			$this->db->table('tbl_kategori_dokumen')->insert($data);
		}
	}
}
