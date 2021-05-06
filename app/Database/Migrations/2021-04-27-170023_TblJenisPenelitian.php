<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblJenisPenelitian extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_jenis_penelitian'	=> [
				'type'				=> 'int',
				'constraint' 		=> 10,
				'auto_increment'	=> true
			],
			'jenis_penelitian'	=> [
				'type'		=> 'varchar',
				'constraint' => 50
			]
		]);

		$this->forge->addKey('id_jenis_penelitian', true);
		$this->forge->createTable('tbl_jenis_penelitian');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_jenis_penelitian');
	}
}
