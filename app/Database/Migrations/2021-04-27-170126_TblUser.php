<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUser extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'				=> 'int',
				'contraint'			=> 10,
				'auto_increment'	=> true
			],
			'nama'	=> [
				'type'		=> 'varchar',
				'constraint' => 100
			],
			'no_hp'	=> [
				'type'		=> 'varchar',
				'constraint' => 20
			],
			'alamat' => [
				'type'		=> 'text'
			],
			'email'	=> [
				'type'		=> 'varchar',
				'constraint' => 75
			],
			'password' => [
				'type'		=> 'varchar',
				'constraint' => 225
			],
			'foto'	 => [
				'type'		=> 'varchar',
				'constraint' => 225
			],
			'status' => [
				'type'		=> 'ENUM',
				'constraint' => ['aktif', 'tidak aktif'],
				'default'	=> 'tidak aktif'
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tbl_user');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_user');
	}
}
