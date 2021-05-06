<?php

namespace App\Models;

use CodeIgniter\Model;

class Bidang extends Model
{

	protected $table                = 'tbl_bidang';
	protected $primaryKey           = 'id_bidang';
	protected $useAutoIncrement     = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['bidang'];

	public function getBidang()
	{
		return $this->findAll();
	}
}
