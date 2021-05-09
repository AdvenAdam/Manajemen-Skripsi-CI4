<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Runall extends Seeder
{
	public function run()
	{
		$this->call('BidangSeeder');
		$this->call('KategoridokumenSeeder');
		$this->call('JenispenelitianSeeder');
		$this->call('UserSeeder');
		$this->call('Dokumen');
	}
}
