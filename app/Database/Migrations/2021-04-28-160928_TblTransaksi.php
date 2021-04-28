<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTransaksi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'				=> 'int',
				'constraint'		=> 10,
				'auto_increment'	=> true
			],
			'id_user'	=> [
				'type'		=> 'int',
				'constraint' => 10
			],
			'id_dokumen'	=> [
				'type'		=> 'int',
				'constraint' => 10
			],
			'tanggal_pinjam'	=> [
				'type'		=> 'date',
			],
			'tanggal_kembali'	=> [
				'type'		=> 'date'
			],
			'denda'	=> [
				'type'		=> 'varchar',
				'constraint' => 10
			],
			'created_at' =>
			[
				'type'	=> 'date'
			],
			'updated_at' =>
			[
				'type'	=> 'date'
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_user', 'tbl_user', 'id', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_dokumen', 'tbl_dokumen', 'id', 'cascade', 'restrict');
		$this->forge->createTable('tbl_transaksi');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_dokumen');
	}
}
