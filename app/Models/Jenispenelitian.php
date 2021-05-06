<?php

namespace App\Models;

use CodeIgniter\Model;

class Jenispenelitian extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tbl_jenis_penelitian';
	protected $primaryKey           = 'id_jenis_penelitian';
	protected $useAutoIncrement     = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['jenis_penelitian'];

	public function getJenisPenelitian()
	{
		return $this->findAll();
	}
}
