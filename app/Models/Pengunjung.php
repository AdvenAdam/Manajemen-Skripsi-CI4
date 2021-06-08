<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengunjung extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tbl_pengunjung';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $protectFields        = true;
	protected $allowedFields        = ['jml_pengunjung'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'date';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function getLastData()
	{
		return $this
			->select('id,jml_pengunjung,created_at')
			->orderBy('id', 'DESC')
			->first();
	}
	public function getData($periode)
	{
		if ($periode == 'Bulanan') {

			return $this
				->select("sum(jml_pengunjung) as jml_pengunjung,concat(MONTHNAME(created_at),' - ', year(created_at) ) As created_at")
				->groupBy(' year(created_at), month(created_at)')
				->get()->getResultArray();
		} elseif ($periode == 'Tahunan') {
			return $this
				->select("sum(jml_pengunjung) as jml_pengunjung, year(created_at) as created_at")
				->groupBy(' year(created_at)')
				->get()->getResultArray();
		} elseif ($periode == 'Harian') {
			return $this
				->select("sum(jml_pengunjung) as jml_pengunjung,created_at")
				->groupBy('created_at')
				->get()->getResultArray();
		}
	}
}
