<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategoridokumen extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tbl_kategori_dokumen';
	protected $primaryKey           = 'id_kategori_dokumen';
	protected $useAutoIncrement     = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['kategori_dokumen'];

	public function getKategoriDokumen()
	{
		return $this->findAll();
	}

	public function getKategoriById($id)
	{
		return $this->find($id);
	}
}
