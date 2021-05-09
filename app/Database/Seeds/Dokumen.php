<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dokumen extends Seeder
{
	public function run()
	{
		for ($i = 1; $i < 6; $i++) {
			$dok = [
				[
					'penulis' 				=> 'Paris Hartati' . $i,
					'tahun'					=> '2016',
					'pembimbing'			=> 'hotman paris' . $i,
					'judul'					=> 'judul' . $i,
					'pendahuluan'			=> 'dumy pendahuluan' . $i,
					'status_peminjaman'		=> 'tersedia',
					'id_kategori_dokumen'	=> '1',
					'id_bidang'				=> '2',
					'id_jenis_penelitian'	=> '3',
					'dokumen'				=> 'dummy file' . $i,
					'created_at'			=> date('Y-m-d'),
					'updated_at'			=> date('Y-m-d')
				]
			];

			$this->db->table('tbl_dokumen')->insertBatch($dok);
		}
	}
}
