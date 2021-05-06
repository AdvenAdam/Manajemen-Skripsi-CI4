<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBidang extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'id_bidang'	=> [
					'type'			=> 'int',
					'constraint'	=> 10,
					'auto_increment' => true
				],
				'bidang'	=> [
					'type'		=> 'varchar',
					'constraint'	=> 50
				]
			]
		);

		$this->forge->addKey('id_bidang', true);
		$this->forge->createTable('tbl_bidang');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_bidang');
	}
}
