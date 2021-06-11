<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use APp\Models\Transaksi;
use DateTime;

class Checker extends BaseController
{
	protected $trx;

	function __construct()
	{
		$this->trx = new Transaksi();
	}

	public function cekDendaUser()
	{
		$id	 = user()->id;
		$data = $this->trx->cekDendaPerUser($id);
		$denda_perhari  = 5000;
		foreach ($data as $list) {
			$tgl_pinjam = new DateTime($list['tanggal_pinjam']);
			$bts_pinjam = $tgl_pinjam->modify("+3 days")->format('Y-m-d');
			$bts_pinjam = strtotime($bts_pinjam);
			$tgl_kembali = strtotime($list['tanggal_kembali']);
			$beda = $tgl_kembali - $bts_pinjam;
			$beda = round($beda / (60 * 60 * 24));
			$denda = 0;
			if ($beda > 0) {
				$denda = $denda_perhari * $beda;
				$this->trx->save([
					'id' => $list['id_trx'],
					'denda' => $denda
				]);
			}
		}
	}
}
