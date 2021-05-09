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
		'id', 'penulis', 'tahun', 'pembimbing', 'judul',
		'pendahuluan', 'status_peminjaman', 'id_kategori_dokumen',
		'id_jenis_penelitian', 'id_bidang', 'dokumen',
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'date';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';


	public function getDokumen($id = false)
	{
		if ($id == false) {
			return $this
				->join('tbl_bidang', 'tbl_dokumen.id_bidang = tbl_bidang.id_bidang')
				->join('tbl_jenis_penelitian', 'tbl_dokumen.id_jenis_penelitian = tbl_jenis_penelitian.id_jenis_penelitian')
				->join('tbl_kategori_dokumen', 'tbl_dokumen.id_kategori_dokumen = tbl_kategori_dokumen.id_kategori_dokumen')
				->orderBy('tbl_dokumen.id')
				->get()->getResultArray();
		} else {
			return $this
				->join('tbl_bidang', 'tbl_dokumen.id_bidang = tbl_bidang.id_bidang')
				->join('tbl_jenis_penelitian', 'tbl_dokumen.id_jenis_penelitian = tbl_jenis_penelitian.id_jenis_penelitian')
				->join('tbl_kategori_dokumen', 'tbl_dokumen.id_kategori_dokumen = tbl_kategori_dokumen.id_kategori_dokumen')
				->where('tbl_dokumen.id=', $id)
				->first();
		}
	}
	public function getDokumenByKategori($id)
	{
		return $this
			->join('tbl_bidang', 'tbl_dokumen.id_bidang = tbl_bidang.id_bidang')
			->join('tbl_jenis_penelitian', 'tbl_dokumen.id_jenis_penelitian = tbl_jenis_penelitian.id_jenis_penelitian')
			->join('tbl_kategori_dokumen', 'tbl_dokumen.id_kategori_dokumen = tbl_kategori_dokumen.id_kategori_dokumen')
			->where('tbl_dokumen.id_kategori_dokumen=', $id)
			->findAll();
	}
	public function getDokumenByBidang($id)
	{
		return $this
			->join('tbl_bidang', 'tbl_dokumen.id_bidang = tbl_bidang.id_bidang')
			->join('tbl_jenis_penelitian', 'tbl_dokumen.id_jenis_penelitian = tbl_jenis_penelitian.id_jenis_penelitian')
			->join('tbl_kategori_dokumen', 'tbl_dokumen.id_kategori_dokumen = tbl_kategori_dokumen.id_kategori_dokumen')
			->where('tbl_dokumen.id_bidang=', $id)
			->findAll();
	}
	public function getDokumenByJenis($id)
	{
		return $this
			->join('tbl_bidang', 'tbl_dokumen.id_bidang = tbl_bidang.id_bidang')
			->join('tbl_jenis_penelitian', 'tbl_dokumen.id_jenis_penelitian = tbl_jenis_penelitian.id_jenis_penelitian')
			->join('tbl_kategori_dokumen', 'tbl_dokumen.id_kategori_dokumen = tbl_kategori_dokumen.id_kategori_dokumen')
			->where('tbl_dokumen.id_jenis_penelitian=', $id)
			->findAll();
	}
}
