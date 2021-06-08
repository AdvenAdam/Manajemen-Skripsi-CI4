<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tbl_transaksi';
	protected $primaryKey           = 'id';
	protected $protectFields        = true;
	protected $allowedFields        = ['id_user', 'id_dokumen', 'denda', 'status', 'tanggal_pinjam', 'tanggal_kembali'];
	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function getTransaksi($id = false)
	{
		if ($id == false) {
			return $this
				->select('tbl_transaksi.id as id_trx,id_user,id_dokumen,username,tbl_transaksi.status,judul,denda,tanggal_pinjam,tanggal_kembali')
				->join('users', 'users.id=tbl_transaksi.id_user')
				->join('tbl_dokumen', 'tbl_dokumen.id=tbl_transaksi.id_dokumen')
				->get()->getResultArray();
		} else {
			return $this
				->select('tbl_transaksi.id as id_trx,id_user,id_dokumen,username,tbl_transaksi.status,judul,denda,tanggal_pinjam,tanggal_kembali')
				->join('users', 'users.id=tbl_transaksi.id_user')
				->join('tbl_dokumen', 'tbl_dokumen.id=tbl_transaksi.id_dokumen')
				->where('tbl_transaksi.id_dokumen=', $id)
				->get()->getResultArray();
		}
	}

	public function cekJmlTrx($id = false)
	{
		if ($id != false) {
			return $this
				->select('id_user')
				->where('status!=', 4)
				->where('id_user=', $id)
				->countAllResults();
		} else {
			return $this
				->select('id_user')
				->where('status!=', 4)
				->countAllResults();
		}
	}

	public function deleteBatch()
	{
		return  $this
			->where('status=', 4)->delete();
	}

	public function cekDendaPerUser($id)
	{
		return $this
			->select('tbl_transaksi.id as id_trx,id_user,id_dokumen,denda,tanggal_pinjam,tanggal_kembali')
			->join('users', 'users.id=tbl_transaksi.id_user')
			->join('tbl_dokumen', 'tbl_dokumen.id=tbl_transaksi.id_dokumen')
			->where('tbl_transaksi.id_user=', $id)
			->get()->getResultArray();
	}

	public function getData($periode)
	{
		if ($periode == 'Bulanan') {

			return $this
				->select("count(id) as jml_trx,concat(MONTHNAME(created_at),' - ', year(created_at) ) As created_at")
				->groupBy(' year(created_at), month(created_at)')
				->get()->getResultArray();
		} elseif ($periode == 'Tahunan') {
			return $this
				->select("count(id) as jml_trx, year(created_at) as created_at")
				->groupBy(' year(created_at)')
				->get()->getResultArray();
		} elseif ($periode == 'Harian') {
			return $this
				->select("count(id) as jml_trx,created_at")
				->groupBy('created_at')
				->get()->getResultArray();
		}
	}

	public function getDataKeranjang($user)
	{
		return $this
			->select('tbl_transaksi.id as id_trx,id_user,id_dokumen,username,tbl_transaksi.status,judul,denda,tanggal_pinjam,tanggal_kembali')
			->join('users', 'users.id=tbl_transaksi.id_user')
			->join('tbl_dokumen', 'tbl_dokumen.id=tbl_transaksi.id_dokumen')
			->where('tbl_transaksi.id_user=', $user)
			->get()->getResultArray();
	}
}
