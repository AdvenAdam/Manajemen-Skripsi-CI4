<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblDokummen extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'				=> 'int',
				'constraint'		=> 10,
				'auto_increment'	=> true
			],
			'penulis'	=> [
				'type'		=> 'varchar',
				'constraint' => 50
			],
			'tahun'		=> [
				'type'		=> 'varchar',
				'constraint' => 5
			],
			'pembimbing'	=> [
				'type'		=> 'varchar',
				'constraint' => 50
			],
			'judul'	=> [
				'type'		=> 'text',
			],
			'pendahuluan' => [
				'type'		=> 'text'
			],
			'status_peminjaman'	=> [
				'type'		=> 'ENUM',
				'constraint' => ['tersedia', 'tidak tesedia'],
				'default'	=> 'tersedia'
			],
			'id_kategori_dokumen' =>
			[
				'type'		=> 'int',
				'constraint' => 10,
			],
			'id_jenis_penelitian' =>
			[
				'type'		=> 'int',
				'constraint' => 10,
			],
			'id_bidang' =>
			[
				'type'		=> 'int',
				'constraint' => 10,
			],
			'dokumen' =>
			[
				'type'		=> 'varchar',
				'constraint' => 255,
				'null' => true,
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
		$this->forge->addForeignKey('id_kategori_dokumen', 'tbl_kategori_dokumen', 'id_kategori_dokumen', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_jenis_penelitian', 'tbl_jenis_penelitian', 'id_jenis_penelitian', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_bidang', 'tbl_bidang', 'id_bidang', 'cascade', 'restrict');
		$this->forge->createTable('tbl_dokumen');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_dokumen');
	}
}
