<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokumen extends Model
{
	protected $table                = 'tbl_dokumen';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'penulis', 'tahun', 'pembimbing', 'judul',
		'pendahuluan', 'status_peminjaman', 'id_kategori_dokumen',
		'id_jenis_penelitian', 'id_bidang'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'date';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';


	public function getDokumen()
	{
		return $this
			->join('tbl_bidang', 'tbl_bidang.id = tbl_dokumen.id_bidang')
			->join('tbl_jenis_penelitian', 'tbl_jenis_penelitian.id = tbl_dokumen.id_jenis_penelitian')
			->join('tbl_kategori_dokumen', 'tbl_kategori_dokumen.id = tbl_dokumen.id_kategori_dokumen')
			->get()->getResultArray();
	}
}
